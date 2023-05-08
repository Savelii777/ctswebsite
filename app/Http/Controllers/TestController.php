<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Question;
use App\Models\CourseUser;
use App\Models\Test;
use App\Services\TestCheckService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TestController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  //отображает страницу с информацией о тесте перед началом выполнения;
  public function testBefore(Test $test)
  {

    return view('test-before', [
      'test' => $test,
    ]);
  }

  //Получить вопросы из базы
  //echo $questionData[0]['question'];
  //echo $questionData[0]['answers'][0];
  //echo $questionData[0]['answers'][1];
  //echo $questionData[0]['answers'][2];
  //echo $questionData[0]['correct_answer'];
  public function getQuetionsInDB($testId)
  {
    $questions = Question::where('test_id', $testId)->get()->toArray();
    $questionDataList = array_map(function ($question) {
      return json_decode($question['data'], true);
    }, $questions);
    return array_merge(...$questionDataList);
    //return "getQuetionsInDB";
  }

  //Добавить вопросы в базу
  /*$que = array(
    "answers" => array("Fake", "Fake", "Cool"),
    "question" => "Raketa",
    "correct_answer" => "3"
  );
  $this->insertQuetionToDB($que, 1);
  */
  public function insertQuetionToDB($question, $testId)
  {
    $questionData = array(
      "question" => $question["question"],
      "answers" => array_values($question["answers"]),
      "correct_answer" => $question["correct_answer"]
    );

    Question::create([
      'test_id' => $testId,
      'data' => json_encode(array($questionData))
    ]);

    return redirect()
      ->route('tests.home')
      ->with('success', 'Вопрос успешно добавлен!');


    //return "insertQuetionToDB";
  }
  public function editQuetionInDB(Question $question)
  {
    return "editQuetionInDB";
  }
  public function removeQuetionInDB(Question $question)
  {
    $question->delete();

    return redirect()->back()->withSuccess('Вопрос успешно удален!');
    //return "removeQuetionInDB";
  }




  //отображает страницу для прохождения теста;
  public function test(Test $test)
  {

    //return $this->getQuetionsInDB(1);
    //return $test;
    //return 123;
    $questionDataList = $this->getQuetionsInDB($test->id);
    if (empty($questionDataList))
      abort(404);
    //$questions = $questionDataList[array_rand($questionDataList)];
    //return $questionDataList[3]['answers'][0];
    //$test->questions = count($questions); //Количество вопросов
    return view('test-demo', [
      'questionDataList' => $questionDataList,
      'test' => $test,
    ]);
  }










  //отображает результаты выполнения теста пользователем;
  public function testResult(Attempt $attempt)
  {

    return view('test-result', [
      'test' => $attempt->test,
      'attempt' => $attempt,
    ]);
  }
  public function getQuetions(Test $test) //Получить вопросы из базы
  {
    //получения вопросов из таблицы
    $questions = Question::where('test_id', $test->id)->get();
    $questionDataList = array();
    foreach ($questions as $question) {
      $questionDataList[] = json_decode($question->data, true);
    }
    return $questionDataList;
    //echo $questionData[0]['question'];
    //echo $questionData[0]['answers'][0];
    //echo $questionData[0]['answers'][1];
    //echo $questionData[0]['answers'][2];
    //echo $questionData[0]['correct_answer'];
  }




  public function check(Request $request)
  {
    /*
      1. Определяем вопрос со свободным ответо или нет. Если со свободным, засчииываем как правильный
      2. Проверяем тестовый вопрос.
      Если 



    */
    //return $request;
    $answers = $request->all();

    $correct_answers = 0;
    $questions = [];

    foreach ($answers as $key => $answer) {
      if (strpos($key, 'question') === 0) {
        // Получаем информацию о вопросе из скрытого поля
        $question = json_decode($answer, true);
        $question['selected_answer'] = $answers['answer' . substr($key, 8)];
        $questions[] = $question;

        if ($question['correct_answer'][0] === 'Свободный ответ') {
          $correct_answers++;
        }
        // Проверяем правильность ответа
        if (is_array($question['selected_answer']) && is_array($question['correct_answer'])) {
          $isCorrect = true;
          foreach ($question['selected_answer'] as $selected) {
            if (!in_array($selected, $question['correct_answer'])) {
              $isCorrect = false;
              break;
            }
          }
          if ($isCorrect) {
            $correct_answers++;
          }
        }elseif ($question['selected_answer'] === $question['correct_answer']) {
          $correct_answers++;
        }
      }
    }

    //return $correct_answers;
    //return $questions[1]['correct_answer'][0];


    $score = round(($correct_answers / count($questions)) * 100);
    $test = json_decode($request->input('test'));
    $attempt = Attempt::create([
      'user_id' => Auth::user()->id,
      'test_id' => $test->id,
      'finished_at' => Carbon::now()->addMinute($test->minutes),
      'correct' => $correct_answers,
      'questions' => count($questions),
      'is_passed' => ($score > 75) ? true : false,
      'is_finished' => ($score > 50) ? true : false,
    ]);
    if ($score > 75) {

      $chapterListWitoutOne =  array();
      for ($i = 1; $i <= count(json_decode($request->test)->chapter->course->chapters); $i++) {
        array_push($chapterListWitoutOne, $i);
      }

      $course_id = json_decode($request->test)->chapter->course->id;
      $chapter_id = json_decode($request->test)->chapter_id;

      $key = array_search($chapter_id,  $chapterListWitoutOne);
      if ($key !== false) {
        unset($chapterListWitoutOne[$key]);
      }
      $user_id = Auth::user()->id;

      $course_user = CourseUser::where('user_id', $user_id)->first();

      if ($course_user) {
        $chapterList = json_decode($course_user->chapter_list);

        $course_user->course_id = $course_id;
        $index = array_search($chapter_id, $chapterList);

        if ($index !== false) {
          unset($chapterList[$index]);
        }

        $course_user->chapter_list = json_encode(array_values($chapterList));
        $course_user->completed = count(json_decode($request->test)->chapter->course->chapters) - count($chapterList);
        $course_user->save();
      } else {
        CourseUser::create([
          'course_id' => $course_id,
          'user_id' => $user_id,
          'completed' => count(json_decode($request->test)->chapter->course->chapters) - count($chapterListWitoutOne),
          'chapter_list' => json_encode(array_values($chapterListWitoutOne))
        ]);
      }
    }

    return view('result', compact('score', 'questions'));
  }
}

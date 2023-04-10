<?php

namespace App\Http\Controllers;

use App\Models\Attempt;
use App\Models\Question;
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
   

  //отображает страницу для прохождения теста;
  public function test(Test $test)
  {
    $questionDataList = $this->getQuetions($test);
    if (empty($questionDataList))
      abort(404);
    $questions = $questionDataList[array_rand($questionDataList)];

    $test->questions = count($questions); //Количество вопросов
    return view('test-demo', [
      'questions' => $questions,
      'test' => $test,
    ]);
  }

  public function check(Request $request)
  {
    $answers = $request->all();
    $questions = json_decode($request->input('questions'), true);

    $correct_answers = 0;

    foreach ($questions as $key => $question) {
      $answer = $request->input('answer' . $key);
      if ($answer == $question['correct_answer']) {
        $correct_answers++;
      }
    }

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

    return view('result', compact('score'));
  }
}
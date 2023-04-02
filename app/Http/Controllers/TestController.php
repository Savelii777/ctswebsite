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

    //отображает страницу для прохождения теста;
    public function test(Test $test)
    {
        $questions = array(
            array(
              "question" => "Что такое береговой ракетный комплекс (БРК)?",
              "answers" => array(
                "комплекс, предназначенный для обстрела морских целей с берега",
                "комплекс, предназначенный для уничтожения наземных целей",
                "комплекс, предназначенный для защиты береговых территорий от противника"
              ),
              "correct_answer" => "комплекс, предназначенный для защиты береговых территорий от противника"
            ),
            array(
              "question" => "Какие виды ракетных систем могут быть включены в состав БРК?",
              "answers" => array(
                "крылатые ракеты",
                "баллистические ракеты",
                "оба варианта"
              ),
              "correct_answer" => "оба варианта"
            ),
            array(
                "question" => "Каковы основные режимы эксплуатации БРК?",
                "answers" => array(
                  "боевой, тренировочный, эксплуатационный",
                  "боевой, транспортный, консервационный",
                  "боевой, строительный, ремонтно-восстановительный"
                ),
                "correct_answer" => "боевой, тренировочный, эксплуатационный"
              )
    
          );
          
        $test->questions = 3; //Количество вопросов
        return view('test-demo', [
            'questions' => $questions,
            'test' => $test,
        ]);

    }

    public function check(Request $request)
    {
        $questions = array(
            array(
              "question" => "Что такое береговой ракетный комплекс (БРК)?",
              "answers" => array(
                "комплекс, предназначенный для обстрела морских целей с берега",
                "комплекс, предназначенный для уничтожения наземных целей",
                "комплекс, предназначенный для защиты береговых территорий от противника"
              ),
              "correct_answer" => "комплекс, предназначенный для защиты береговых территорий от противника"
            ),
            array(
              "question" => "Какие виды ракетных систем могут быть включены в состав БРК?",
              "answers" => array(
                "крылатые ракеты",
                "баллистические ракеты",
                "оба варианта"
              ),
              "correct_answer" => "оба варианта"
            ),
            array(
                "question" => "Каковы основные режимы эксплуатации БРК?",
                "answers" => array(
                  "боевой, тренировочный, эксплуатационный",
                  "боевой, транспортный, консервационный",
                  "боевой, строительный, ремонтно-восстановительный"
                ),
                "correct_answer" => "боевой, тренировочный, эксплуатационный"
              )
    
          );

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

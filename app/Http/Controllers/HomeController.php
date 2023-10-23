<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $courses = Course::all();
        $userId = auth()->id(); // Получаем ID текущего пользователя
        $user = User::find($userId);
        $questions = Order::orderBy('created_at', 'desc');

        $keyword = $request->input('keyword');

        if ($keyword) {
            $questions = $questions->where(function ($query) use ($keyword) {
                $query->where('created_at', 'LIKE', "%$keyword%")
                    ->orWhere('user_info', 'LIKE', "%$keyword%");
            });
        }

        $questions = $questions->get();

        // Фильтрация вопросов
        $filteredQuestions = $questions->filter(function ($question) use ($user) {
            $userInfo = json_decode($question->user_info, true);

            // Проверяем совпадение имени и номера телефона
            return $userInfo['name'] === $user->name && $userInfo['phone_number'] === $user->phone_number;
        });

        return view('home', compact('courses', 'filteredQuestions'));
    }

    public function getPhoto($userId, $photoName){
        $path = storage_path('app/public/images/users/'.$userId."/".$photoName);
        return response()->file($path);
    }

    public function getFiles($chapterId, $fileName){
        $path = storage_path('app/public/files/chapters/'.$chapterId."/".$fileName);
        return response()->file($path);
    }

    public function course($id)
    {
        $course = Course::query()
            ->with(["chapters.tests.questions","chapters.tests.attempts"])
            ->where("id",$id)

            ->first();



      // Log::info(print_r($course->toArray(),true));
        return view('course', [
            'course' => $course
        ]);
    }
    public function materials(Chapter $chapter)
    {
        return view('materials', [
            'chapter' => $chapter
        ]);
    }
    public function materialsVideo(Chapter $chapter)
    {
        return view('materials-video', [
            'chapter' => $chapter
        ]);
    }
    public function materialsAllVideo(Course $course)
    {
       // return $course;
        return view('materials-Allvideo', [
            'course' => $course,
        ]);
    }

    public function settings()
    {
        return view('settings');
    }

    public function test()
    {
        return view('test');
    }

    public function testShow()
    {
        return view('main-test');
    }
}

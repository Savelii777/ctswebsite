<?php

namespace App\Http\Controllers;

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
    public function index()
    {
        $courses = Course::all();
        return view('home', compact('courses'));
    }

    public function getPhoto($userId, $photoName){
        $path = storage_path('app/public/images/users/'.$userId."/".$photoName);
        return response()->download($path);
    }

    public function getFiles($chapterId, $fileName){
        $path = storage_path('app/public/files/chapters/'.$chapterId."/".$fileName);
        return response()->download($path);
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

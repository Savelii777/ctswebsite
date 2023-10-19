<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\Course;

use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses = Course::sortable()->simplePaginate(20);

        $keyword = $request->input('keyword');
        $query = Store::query();

        if ($keyword) {
            $query->whereRaw('LOWER(name) LIKE ?', ["%$keyword%"])
            ->orWhereRaw('LOWER(section) LIKE ?', ["%$keyword%"])
            ->orWhereRaw('LOWER(description) LIKE ?', ["%$keyword%"]);
            // Add more columns as needed
        }
        if (Store::value('dollar')>0.0)
        {
            $currentDollar = Store::value('dollar');
        }
        else{
            $currentDollar = 0.0;
        }


        $items = $query->sortable()->simplePaginate(2000);

        return view('admin.course.index', compact('courses', 'items', "currentDollar"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experts = User::role('admin')->get();

        return view('admin.course.create', [
            'experts' => $experts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:jpg,jpeg,png,gif,bmp',
            'user_id' => 'exists:App\Models\User,id'
        ],
        [
            'title.required' => 'Поле название должно быть заполено!',
            'max' => 'Максимальная длина параметра 255 символов!',
            'mimes' => 'Изображение должно быть в формате jpg,jpeg,png,gif,bmp',
            'exists' => 'Пользователь не найден, возможно он был удален'
        ]);

        $course = Course::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'hours' => $request->get('hours'),
            'user_id' => $request->get('user_id')
        ]);
        $item = Store::create([
            'tsection' => $request->get('section'),
            'name' => $request->get('name'),
            'retail_price' => $request->get('retail_price'),
            'dealer' => $request->get('dealer'),
            'availability' => $request->get('availability'),
            'description' => $request->get('description'),

        ]);

        /*if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/courses/' . $course->id, $filename,'public');
            $course->update(['img_url' => "/storage/images/" . $course->id . "/" . $filename]);
        }*/

        return redirect()
            ->route('course.index')
            ->with('success', 'Курс успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @param  \App\Models\Store  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $experts = User::role('admin')->get();

        return view('admin.course.edit', [
            'course' => $course,
            'experts' => $experts
        ]);
    }

    public function chapters(Course $course)
    {
        return view('admin.course.chapters', [
            'course' => $course
        ]);
    }

    public function elements(Srote $item)
    {
        return view('admin.course.chapters', [
            'item' => $item
        ]);
    }
    public function search(Request $request, Srote $item)
    {
        $keywords = $request->input('keywords');
        $results = $item->where('name', 'like', '%' . $keywords . '%')->get();
        // Выполните поиск по ключевым словам в вашей базе данных
        return view('admin.course.chapters', [
            'item' => $results
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $validator = $request->validate([
            'title' => 'required|max:255',
            'image' => 'mimes:jpg,jpeg,png,gif,bmp',
            'user_id' => 'exists:App\Models\User,id'
        ],
        [
            'title.required' => 'Поле название должно быть заполено!',
            'max' => 'Максимальная длина параметра 255 символов!',
            'mimes' => 'Изображение должно быть в формате jpg,jpeg,png,gif,bmp',
            'exists' => 'Пользователь не найден, возможно он был удален'
        ]);

        $course->title = $request->get('title');
        $course->description = $request->get('description');
        $course->user_id = $request->get('user_id');
        $course->hours = $request->get('hours');
        $course->save();

        /*if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if(Storage::exists('public/images/courses/' . $course->id)) {
                $files = Storage::allFiles('public/images/courses/' . $course->id);
                Storage::delete($files);
            }
            $request->image->storeAs('images/courses/' . $course->id, $filename,'public');
            $course->update(['img_url' => "/storage/images/courses/" . $course->id . "/" . $filename]);
        }*/

        return redirect()
            ->route('course.index')
            ->with('success', 'Курс успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        Store::truncate();
        return redirect()->back()->with('success', 'All stores have been deleted.');
    }
}

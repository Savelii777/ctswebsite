<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\Chapter;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function createOfChapter(Chapter $chapter)
    {
        return view('admin.test.create', [
            'chapter' => $chapter,
        ]);
    }

    public function questions(Test $test)
    {
        return view('admin.test.questions', [
            'test' => $test
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
            'min_correct' => 'required|integer',
            'minutes' => 'required|integer'
        ],
            [
                'min_correct.required' => 'Поле минимальное количество верных ответов должно быть заполено!',
                'minutes.required' => 'Поле минуты должно быть заполено!',
                'integer' => 'Укажите целое число!',
            ]);

        Test::create([
            'min_correct' => $request->get('min_correct'),
            'minutes' => $request->get('minutes'),
            'chapter_id' => $request->get('chapter_id')
        ]);

        return redirect()
            ->route('chapter.tests', $request->get('chapter_id'))
            ->with('success', 'Тест успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    public function editOfChapter(Chapter $chapter, Test $test)
    {
        return view('admin.test.edit', [
            'test' => $test,
            'chapter' => $chapter,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $validator = $request->validate([
            'min_correct' => 'required|integer',
            'minutes' => 'required|integer'
        ],
            [
                'min_correct.required' => 'Поле минимальное количество верных ответов должно быть заполено!',
                'minutes.required' => 'Поле минуты должно быть заполено!',
                'integer' => 'Укажите целое число!',
            ]);


            $test->min_correct = $request->get('min_correct');
            $test->minutes = $request->get('minutes');
            $test->save();

        return redirect()
            ->route('chapter.tests', $request->get('chapter_id'))
            ->with('success', 'Тест успешно отредактирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();

        return redirect()->back()->withSuccess('Тест успешно удален!');
    }
}

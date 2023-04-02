<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\File;
use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
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
        return view('admin.file.create', [
            'chapter' => $chapter,
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
            'file' => 'required|mimes:pdf'
        ],
            [
                'file.required' => 'Пожалуйста, прикрепите файл!',
                'mimes' => 'Изображение должно быть в формате pdf'
            ]);

        $filename = $request->file->getClientOriginalName();
        $request->file->storeAs('files/chapters/' . $request->chapter_id, $filename, 'public');

        $file = File::create([
            'title' => $filename,
            'type' => 'pdf',
            'url' => "/storage/files/chapters/" . $request->chapter_id . "/" . $filename,
            'chapter_id' => $request->chapter_id
        ]);
        
        return redirect()
            ->route('chapter.files', $request->get('chapter_id'))
            ->with('success', 'Файл успешно добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $path = str_replace("/storage", "public", $file->url);
        
        Storage::delete($path);

        $file->delete();

        return redirect()->back()->withSuccess('Файл успешно удален!');
    }
}

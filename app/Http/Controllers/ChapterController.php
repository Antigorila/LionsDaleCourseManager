<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;
use App\Models\Course;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        //
    }
    public function createView(Course $course)
    {
        return view('create.chapter', ['course' => $course]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        $chapter = Chapter::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'course_id' => $request->input('course_id'),
        ]);

        $chapter->save();
        toastr()->success('Chapter created!');
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Chapter $chapter)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chapter $chapter)
    {
        return view('edit.chapter', ['chapter' => $chapter]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChapterRequest $request, Chapter $chapter)
    {
        $this->authorize('update', $chapter);

        $chapter->update($request->all());

        toastr()->info('Chapter updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $this->authorize('delete', $chapter);

        $chapter->questions()->delete();
        foreach($chapter->questions as $question)
        {
            foreach($question->doneTasks as $doneTask )
            {
                $doneTask->delete();
            }
            $question->delete();
        }

        $chapter->delete();
        toastr()->error($chapter->title . ' deleted!');
        return view('welcome');
    }
}

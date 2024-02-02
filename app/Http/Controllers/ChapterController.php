<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use App\Http\Requests\StoreChapterRequest;
use App\Http\Requests\UpdateChapterRequest;

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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChapterRequest $request)
    {
        //
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

        return view('welcome')->with('message', 'Chapter updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chapter $chapter)
    {
        $this->authorize('delete', $chapter);

        $chapter->questions()->delete();

        $chapter->delete();
        return back()->with('message', $chapter->title . ' was deleted Successfully');
        //return view('welcome')->with('message', $chapter->title . ' was deleted Successfully');
    }
}

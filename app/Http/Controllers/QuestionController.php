<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;
use App\Models\Chapter;

class QuestionController extends Controller
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
    public function createView(Chapter $chapter)
    {
        return view('create.question', ['chapter' => $chapter]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestionRequest $request)
    {
        $question = Question::create([
            'question' => $request->input('question'),
            'answer' => $request->input('answer'),
            'chapter_id' => $request->input('chapter_id'),
        ]);
        $question->save();
        toastr()->success('Question created!');
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateQuestionRequest $request, Question $question)
    {
        $this->authorize('update', $question);

        $question->update($request->all());

        toastr()->info('Course updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Question $question)
    {
        $this->authorize('delete', Question::class);

        $question->delete();
        toastr()->error( $question->questionn .  ' deleted!');
        return view('welcome');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\DoneTask;
use App\Http\Requests\StoreDoneTaskRequest;
use App\Http\Requests\UpdateDoneTaskRequest;
use App\Models\Chapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class DoneTaskController extends Controller
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
    public function store(StoreDoneTaskRequest $request)
    {
        $answer = $request->input('answer');
        $answerInBase = DB::table('questions')->where('id', $request->input('question_id'))->value('answer');

        if  ($answerInBase === $answer)
        {
            $done_task = DoneTask::create([
                'user_id' => auth()->user()->id,
                'question_id' => $request->input('question_id'),
                'course_id' => $request->input('course_id'),
            ]);
            $done_task->save();

            $questionInCourse = 0;

            $correctAnswersYetByStudentInThisCourse = DB::table('done_tasks')
            ->where('user_id', auth()->user()->id)
            ->where('course_id', $done_task->course_id)
            ->count('id');

            $chapters = DB::table('chapters')
            ->where('course_id', $done_task->course_id)
            ->pluck('id');

            foreach ($chapters as $chapter) {
                $questionInChapter = DB::table('questions')
                ->where('chapter_id', $chapter)
                ->count('id');
                $questionInCourse += $questionInChapter;
            }

            if($questionInCourse === $correctAnswersYetByStudentInThisCourse)
            {
                DB::table('course_users')
                    ->where('course_id', $done_task->course_id)
                    ->where('user_id', $done_task->user_id)
                    ->update(['completed' => true]);

                toastr()->success('Correct answer!', 'Completed course!');
                return back();
            }
            else
            {
                toastr()->success('Correct answer!');
                return back();
            }
            
        }
        else
        {
            toastr()->error('Wrong answer!');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DoneTask $doneTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoneTask $doneTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoneTaskRequest $request, DoneTask $doneTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoneTask $doneTask)
    {
        //
    }
}

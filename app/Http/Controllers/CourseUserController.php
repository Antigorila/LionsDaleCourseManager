<?php

namespace App\Http\Controllers;

use App\Models\CourseUser;
use App\Http\Requests\StoreCourseUserRequest;
use App\Http\Requests\UpdateCourseUserRequest;
use App\Models\Course;

class CourseUserController extends Controller
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
    public function store(StoreCourseUserRequest $request)
    {
        $courseUser = CourseUser::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->input('course_id'),
            'seen' => false,
            'completed' => false,
        ]);

        $courseUser->save();
        toastr()->success('Applied to course!');
        return back();
    }


    /**
     * Display the specified resource.
     */
    public function show(CourseUser $courseUser)
    {
        //return view('show.course_user', ['courseUser' => $courseUser]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseUser $courseUser)
    {
        //
    }

    /**
     * Update the specified resource in storage. 
     */
    public function update(UpdateCourseUserRequest $request, CourseUser $courseUser)
    {
        //
    }
    public function updateActivity(CourseUser $courseUser)
    {
        $courseUser->seen = !$courseUser->seen;
        $courseUser->update();
        toastr()->info('Activity has been modified.');
        return back();
    }
    public function updateCompleted(CourseUser $courseUser)
    {
        $courseUser->completed = !$courseUser->completed;
        $courseUser->update();
        toastr()->info('Completed has been modified.');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseUser $courseUser)
    {
        $this->authorize('delete', $courseUser);

        $courseUser->delete();
        toastr()->error('Delete was successful!');
        return view('welcome');
    }
}

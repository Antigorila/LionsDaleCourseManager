<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
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
        return view('create.course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create([
            'name' => $request->input('name'),
            'level' => $request->input('level'),
            'type_id' => $request->input('type_id'),
            'description' => $request->input('description'),
        ]);

        $course->save();
        toastr()->success('Event created!');
        return back();
    }
    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        foreach ($course->user_course as $course_user)
        {
            if($course_user->user_id === Auth::user()->id)
            {
                $course_user->seen = true;
                $course_user->save();
            }
        }
        return view('show.course', ['course' => $course]);
    }

    public function showUsers(Course $course)
    {
        return view('show.course_user', ['course' => $course]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('edit.course', ['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $this->authorize('update', $course);

        $course->update($request->all());

        toastr()->info('Course updated.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);

        foreach ($course->chapters as $chapter) {
            $chapter->questions()->delete();
        }

        $course->chapters()->delete();
        $course->user_course()->delete();

        $course->delete();
        toastr()->error($course->name . ' deleted!');
        return view('welcome');
    }
}

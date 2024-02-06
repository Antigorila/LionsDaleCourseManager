<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('show.schools');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.school');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreSchoolRequest $request)
    {
        $school = School::create([
            'name' => $request->input('name'),
            'contact_name' => $request->input('contact_name'),
            'contact_email' => $request->input('contact_email'),
            'address' => $request->input('address')
        ]);
        $school->save();
        toastr()->success('School created!');
        return view('welcome');  
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
        return view('show.studentsInSchool', ['school' => $school]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(School $school)
    {
        return view('edit.school', ['school' => $school]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        $this->authorize('update', $school);

        $school->update($request->all());

        toastr()->info( $school->name . ' updated!');
        return back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(School $school)
    {
        $this->authorize('delete', $school);
        
        
        foreach ($school->student as $student) {
            foreach ($student->user_course as $user_course ) {
                $user_course->delete();
            }
        }
        
        $school->student()->delete();
        $school->delete();

        toastr()->error($school->name .' deleted!');
        return view('show.schools');
    }
}

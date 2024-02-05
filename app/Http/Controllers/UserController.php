<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::all();
        return view('show.students');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.students');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(School $school)
    {
       
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function updateActivity(User $user)
    {
        $user->activity = $user->activity == true ? false : true;
        $user->update();
        return back()->with('message', 'Activity updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       //$this->authorize('delete', $student);
       //$user = User::find($user);
       //dd($user);
        $user->delete();
        return back()->with('message', 'Delete was Successfully');
    }


}

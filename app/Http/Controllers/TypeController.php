<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('show.type');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create.type');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTypeRequest $request)
    {
        $type = Type::create([
            'type' => $request->input('type'),
            'slug' => $request->input('slug'),
        ]);

        $type->save();

        toastr()->success('Type created!');
        return view('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('edit.type', ['type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $this->authorize('update', $type);

        $type->update($request->all());

        toastr()->info($type->type .' updated!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        //Its better if you wont delete this, trust me...you dont want to delete all the courses, chapter, question with this
    }
}

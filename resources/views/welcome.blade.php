@section('content')
@extends('layouts.app')
@foreach (App\Models\Course::all() as $course)
<div class="m-4"> 
    <div class="card bg-dark text-white">
        <div class="m-2 text-white">
            {{  $course->type->type }} - {{ $course->level}}
            <div class="card">
                <div class="col">
                    <h3 class="m-2 text-white">{{ $course->name }}</h3>
                    <div class="card-body">
                        <p class="card-text text-white">{{ $course->description }}</p>
                    </div>
                </div>
                <hr class="m-2 text-white">
                <div class="col">
                    @if (Auth::check())
                        <div class="col">
                            @if (in_array(Auth::user()->id, $course->user_course()->pluck('user_id')->toArray()))
                            <form action="{{ route('courses.show', $course) }}" method="GET">
                                <button type="submit" class="btn btn-info m-2">Enter</button>
                            </form>
                            @else
                            <!-- TODO: toastr message after Apply -->
                                <button class="btn btn-info m-2">Apply</button>
                            @endif
                            @if(Auth::user()->id == 1 && in_array(Auth::user()->id, $course->user_course()->pluck('user_id')->toArray()))
                                <button type="submit" class="btn btn-danger m-2">Delete</button>
                                <button class="btn btn-info m-2">Edit</button>
                                <button class="btn btn-info m-2">Show</button>   
                            @else
                                <form action="{{ route('courses.show', $course) }}" method="GET">
                                    <button type="submit" class="btn btn-info m-2">Enter</button>
                                </form>
                                <form action="{{ route('course_users.show', $course) }}" method="GET">
                                    <button type="submit" class="btn btn-info m-2">Show Users</button>
                                </form>
                                <button class="btn btn-danger m-2">Delete</button>
                                <button class="btn btn-info m-2">Edit</button>
                                <button class="btn btn-info m-2">Show Users</button>   
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
      </div>
    </div>
</div>   
@endforeach
<div class="container">
    <div class="row">
        @foreach (\App\Models\School::all() as $school)
            <div class="row">
                <div class="text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-3 m-4 p-4">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title">{{ $school->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>{{ $school->contact_name }}</p>
                        <p>{{ $school->contact_email }}</p>
                        <p>{{ $school->address }}</p>
                    </div>
                    @if(Auth::check() && Auth::user()->id == 1)
                        <button class="btn btn-danger m-2">Delete</button>
                        <button class="btn btn-info m-2">Edit</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
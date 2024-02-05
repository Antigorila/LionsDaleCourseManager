@section('content')
@extends('layouts.app')
@foreach (App\Models\Course::all() as $course)
<div class="m-4"> 
    <div class="card bg-dark">
        <div class="m-2 text-white">
            {{  $course->type->type }} - {{ $course->level}}
            <div class="card">
                <div class="col">
                    <h3 class="m-2">{{ $course->name }}</h3>
                    <div class="card-body">
                        <p class="card-text">{{ $course->description }}</p>
                    </div>
                </div>
                <hr class="m-2">
                <div class="col">
                    @if (Auth::check())
                        <div class="col d-flex">
                            @if (in_array(Auth::user()->id, $course->user_course()->pluck('user_id')->toArray()))
                            <form action="{{ route('courses.show', $course) }}" method="GET" class="m-2">
                                <button type="submit" class="btn btn-info">Enter</button>
                            </form>
                            @else
                            <!-- TODO: toastr message after Apply -->
                            <form action="{{ route('course_users.store') }}" method="POST" class="m-2">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $course->id }}">
                                <button type="submit" class="btn btn-info">Apply</button>
                            </form>                                                       
                            @endif

                            @if (Auth::user()->id == 1)
                            <form action="{{ route('courses.showUsers', $course) }}" method="GET" class="m-2">
                                <button type="submit" class="btn btn-info">Show Users</button>
                            </form>
                            <form action="{{ route('courses.edit', $course) }}" method="GET" class="m-2">
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                            <form action="{{ route('courses.destroy', $course) }}" method="POST" class="m-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form> 
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
                <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
                    <div class="row">
                        <div class="col">
                            <h4 class="card-title text-white">{{ $school->name }}</h4>
                            <hr class="text-white">
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-white">{{ $school->contact_name }}</p>
                        <p class="text-white">{{ $school->contact_email }}</p>
                        <p class="text-white">{{ $school->address }}</p>
                        <p class="text-white">Students in school: {{ $school->student->count() }}</p>
                    </div>
                    @if(Auth::check() && Auth::user()->id == 1)
                        <div class="d-flex">     
                            <form action="{{ route('schools.edit', $school) }}" method="GET" class="m-2">
                                <button type="submit" class="btn btn-info">Edit</button>
                            </form>
                            <form action="{{ route('schools.show', $school) }}" method="GET" class="m-2">
                                <button type="submit" class="btn btn-info">Show students</button>
                            </form>
                            <form action="{{ route('schools.destroy', $school) }}" method="POST" class="m-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
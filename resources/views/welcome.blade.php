@section('content')
@extends('layouts.app')

@foreach (App\Models\Course::all() as $course)
<div class="m-2">
    <div class="text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-3">
        <div class="col m-2">
            {{ $course->name }} - {{ $course->level}}
            <div class="card">
                <div class="col">
                    <h3 class="m-2">{{ $course->type->type }}</h3>
                    <div class="card-body">
                        <p class="card-text">{{ $course->description }}</p>
                    </div>
                </div>
                <div class="col">
                    @if (Auth::check())
                        <button class="btn btn-dark m-2">Enter</button>
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
        @foreach (App\Models\School::all() as $school)
        <div class="col-4">
            <div class="card bg-dark text-white">
                <div class="row">
                    <div class="card border-dark">
                        <div class="card-body">
                            <h4 class="card-title">{{ $school->name }}</h4>
                            <p class="card-text">{{ $school->address }}</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
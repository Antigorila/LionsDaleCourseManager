@section('content')
@extends('layouts.app')

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
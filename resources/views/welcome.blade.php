@section('content')
@extends('layouts.app')
@if (Session::has('message'))
<script>
    toastr.success("{{Session::get('message')}}");
</script>
@endif
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
@endsection
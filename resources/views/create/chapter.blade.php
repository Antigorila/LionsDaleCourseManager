@section('content')
@extends('layouts.app')
<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-white">Create chapter for {{ $course->name }} chapter: </h4>
                    </div>
                    <hr class="text-white m-2">
                </div> 
            </div>
            <form action="{{ route('chapters.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <label for="name" class="form-label text-white">Chapter title:</label>
                    <input name="title" id="title" class="form-control mb-3" placeholder="Chapter name">    
                    <hr class="text-white">  
                    <label for="contact_email" class="form-label text-white">Content:</label>        
                    <div class="form-control mb-3 overflow-auto text-truncate">
                        <textarea name="content" id="content" class="fullSize" oninput="adjustHeight(this)"></textarea>
                    </div>
                    <input hidden id="course_id" name="course_id" value="{{ $course->id }}">
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info m-2">Save</button>
                    </div>
                    <hr class="text-white"> 
                </div>       
            </form> 
        </div>
    </div>
</div>
<script>
    function adjustHeight(textarea) {
        textarea.style.height = "auto";
        textarea.style.height = (textarea.scrollHeight) + "px";
    }
</script>
@endsection
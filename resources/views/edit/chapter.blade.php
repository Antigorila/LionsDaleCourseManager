@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-white">Modify: {{ $chapter->title }}</h4>
                        <button type="submit" class="btn btn-info m-2">Add question</button>
                    </div>
                    <hr class="text-white m-2">
                </div> 
            </div>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <label for="name" class="form-label text-white">Chapter name:</label>
                    <input name="name" id="name" class="form-control mb-3" value="{{ $chapter->title }}">    
                    <hr class="text-white">  
                    <label for="contact_email" class="form-label text-white">Description:</label>        
                    <div class="form-control mb-3 overflow-auto text-truncate">
                        <textarea name="description" id="description" class="fullSize" oninput="adjustHeight(this)">{{ $chapter->content }}</textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info m-2">Save</button>
                        <!-- TODO: same error like delet chapter in the course.edit -->
                        <form action="{{ route('chapters.destroy', $chapter) }}" method="POST" class="m-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger m-2">Delete this chapter</button>
                        </form> 
                    </div>
                    <hr class="text-white"> 
                    @if ($chapter->questions->count() > 0)
                    <h4 class="text-white pb-3">Questions:</h4>
                    @foreach ($chapter->questions as $question)
                        <label for="name" class="form-label text-white">Question:</label>
                        <input name="name" id="name" class="form-control mb-3" value="{{ $question->question }}">    
                        <label for="name" class="form-label text-white">Answer:</label>
                        <input name="name" id="name" class="form-control mb-3" value="{{ $question->answer }}">    
                        <button type="submit" class="btn btn-info m-2">Save</button>
                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                        <hr class="text-white"> 
                    @endforeach
                    @else
                        <label for="name" class="form-label text-white">There is no questions yet...</label>
                    @endif
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

    window.onload = function() {
        adjustHeight(document.getElementById("description"));
    }
</script>

@endsection
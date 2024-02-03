@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-white">Modify: {{ $course->name }}</h4>
                        <form action="{{ route('chapters.createView', $course) }}" method="GET">
                            <button type="submit" class="btn btn-info m-2">Add Chapter</button>
                        </form>                        
                    </div>
                    <hr class="text-white m-2">
                </div>                
            </div>
            <form action="{{ route('courses.update', $course) }}" method="POST">
                @csrf
                @method('PUT')
                    <label for="name" class="form-label text-white">Course name:</label>
                    <input name="name" id="name" class="form-control mb-3" value="{{ $course->name }}">    
                        <hr class="text-white">  
                    <label for="level" class="form-label text-white">Level:</label>   
                    <input name="level" id="level" class="form-control mb-3" value="{{ $course->level }}">   
                        <hr class="text-white">
                        <label for="type" class="form-label text-white">Type:</label>
                        <div class="form-group">
                            <select class="form-control" name="type_id" id="type_id">
                                @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}" {{ $type->id == $course->type->id ? 'selected' : '' }}>{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="text-white">      
                    <label for="description" class="form-label text-white">Description:</label>        
                    <div class="form-control mb-3 overflow-auto text-truncate">
                        <textarea name="description" id="description" class="fullSize" oninput="adjustHeight(this)">{{ $course->description }}</textarea>
                    </div>
                    <hr class="text-white">  
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info m-2">Save</button>
            </form> 
            <form action="{{ route('courses.destroy', $course) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-danger m-2">Delete</button>
            </form> 
            </div>                         
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="row">
                    @if ($course->chapters->count() > 0)
                    <h4 class="card-title text-white">Modify: {{ $course->name }} chapters</h4>
                    <hr class="text-white m-2">
                    <label for="text" class="form-label text-white">Choose a chapter to modify:</label>
                    <div class="form-group">
                            <select class="form-control" id="chapterSelect">
                            @foreach ($course->chapters as $chapter)
                                <option value="{{ $chapter->id }}">{{ $chapter->title }}</option>
                            @endforeach
                            </select>
                            <hr class="text-white m-3">
                            <div class="d-flex justify-content-center">
                                <button id="modifyChapterButton" type="submit" class="btn btn-info m-2">Choose this chapter to modify</button>
                                <form id="deleteChapterForm" action="{{ route('chapters.destroy', $chapter) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button id="deleteChapterButton" type="submit" class="btn btn-danger m-2">Delete this chapter</button>
                                </form>
                            </div>
                        @else
                        <div class="d-flex justify-content-center">
                            <i class="text-white m-2">There is no chapters yet...</i>
                        </div>
                        <div class="d-flex justify-content-center">
                            <form action="{{ route('chapters.createView', $course) }}" method="GET">
                                <button type="submit" class="btn btn-info m-2">Add chapter</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>      
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

    document.getElementById('modifyChapterButton').addEventListener('click', function() {
        var selectedChapterId = document.getElementById('chapterSelect').value;
        if (selectedChapterId) {
            window.location.href = '{{ route("chapters.edit", ["chapter" => ":chapterId"]) }}'.replace(':chapterId', selectedChapterId);
        }
    });

    window.onload = function() {
    var selectedChapterId = document.getElementById('chapterSelect').value;
    if (selectedChapterId) {
        document.getElementById('deleteChapterForm').action = '{{ route("chapters.destroy", ["chapter" => ":chapterId"]) }}'.replace(':chapterId', selectedChapterId);
    }
}

document.getElementById('chapterSelect').addEventListener('change', function() {
    var selectedChapterId = this.value;
    if (selectedChapterId) {
        document.getElementById('deleteChapterForm').action = '{{ route("chapters.destroy", ["chapter" => ":chapterId"]) }}'.replace(':chapterId', selectedChapterId);
    }
});


</script>


@endsection
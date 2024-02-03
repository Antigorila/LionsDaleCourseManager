@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <form action="{{ route('courses.store') }}" method="POST">
                @csrf
                @method('POST')
                    <label for="name" class="form-label text-white">Course name:</label>
                    <input name="name" id="name" class="form-control mb-3" placeholder="Course name">    
                        <hr class="text-white">  
                    <label for="level" class="form-label text-white">Level:</label>   
                    <input name="level" id="level" class="form-control mb-3" placeholder="Level">   
                        <hr class="text-white">
                        <label for="type" class="form-label text-white">Type:</label>
                        <div class="form-group">
                            <select class="form-control" name="type_id" id="type_id">
                                @foreach (\App\Models\Type::all() as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr class="text-white">      
                    <label for="description" class="form-label text-white">Description:</label>        
                    <div class="form-control mb-3 overflow-auto text-truncate">
                        <textarea name="description" id="description" class="fullSize" oninput="adjustHeight(this)"></textarea>
                    </div>
                    <hr class="text-white">  
                    <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info m-2">Save</button>
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
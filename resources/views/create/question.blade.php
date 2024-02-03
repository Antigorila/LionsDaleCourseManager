@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title text-white">Add question to {{ $chapter->title }} chapter:</h4>
                    </div>
                </div> 
            </div>
            <form action="{{ route('questions.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <hr class="text-white"> 
                    <label for="name" class="form-label text-white">Question:</label>
                        <input name="question" id="question" class="form-control mb-3" placeholder="Question">    
                    <label for="name" class="form-label text-white">Answer:</label>
                        <input name="answer" id="answer" class="form-control mb-3" placeholder="Answer">    
                        <input hidden name="chapter_id" id="chapter_id" value="{{ $chapter->id }}">
                    <button type="submit" class="btn btn-info m-2">Save</button>
                    <hr class="text-white"> 
                </div>       
            </form> 
        </div>
    </div>
</div>

@endsection
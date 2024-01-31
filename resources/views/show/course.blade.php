@section('content')
@extends('layouts.app')
<div class="m-4">
    <div class="text-dark-emphasis bg-dark-subtle border border-dark-subtle rounded-3">
        <div class="m-2">
            {{  $course->type->type }} - {{ $course->level}}
            <div class="card">
                <div class="col">
                    <h3 class="m-2">{{ $course->name }}</h3>
                    <div class="card-body">
                        <p class="card-text">{{ $course->description }}</p>
                    </div>
                </div>
                <div class="col">
                    <h3 class="m-2">Chapters:</h3>
                    @foreach($course->chapters as $chapter)
                        <div class="card m-3">
                            <div class="card-body dark2 rounded">
                                <h4 class="card-title text-white">{{ $chapter->title }}</h4>
                                <p class="card-text text-white">{{ $chapter->content }}</p>
                                <div class="card">
                                    <div class="card-body col-12 dark1 rounded">
                                    @foreach ($chapter->questions as $question)
                                        <h5 class="card-title text-white">{{ $question->question }}</h5>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text" id="basic-addon1">Answear:</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1">
                                          </div>
                                        <button class="btn btn-info m-2">Check</button>  
                                        <hr class="m-2 text-white">                                            
                                    @endforeach
                                    </div>
                                </div> 
                            </div>
                        </div>   
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </div>
</div>   
@endsection
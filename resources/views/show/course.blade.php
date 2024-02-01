@section('content')
@extends('layouts.app')
<div class="m-4">
    <div class="text-dark-emphasis bg-dark border rounded-3 border-dark">
        <div class="m-2 text-white">
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
                    <div class="text-dark-emphasis bg-dark border rounded-3">
                        <div class="card m-1">
                            <div class="card-body rounded">
                                <h4 class="card-title">{{ $chapter->title }}</h4>
                                <p class="card-text">{{ $chapter->content }}</p>
                                <div class="card">
                                    <div class="card-body col-12 rounded bg-dark">
                                    @foreach ($chapter->questions as $question)
                                        <h5 class="card-title text-white">{{ $question->question }}</h5>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">Answer:</span>
                                            </div>
                                            <input type="text" class="form-control" aria-describedby="basic-addon1">
                                        </div>
                                        <button class="btn btn-info m-2" onclick="checkAnswer()">Check</button>  
                                        <button class="btn btn-info m-2" onclick="showAnswer()">Show answer</button>  
                                        <hr class="m-2 text-white">                                          
                                    @endforeach
                                    </div>
                                </div> 
                            </div>
                        </div> 
                    </div>  
                    <br>
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </div>
</div>
<script>
    function showAnswer() {
        var answer = "{{ $question->answer }}";
        alert(answer);
    }

    function checkAnswer() {
        var userAnswer = document.querySelector('.form-control').value;
        var correctAnswer = "{{ $question->answer }}";

        if (userAnswer === correctAnswer) {
            alert('Correct!');
        } else {
            alert('Wrong!');
        }
    }
</script>

@endsection
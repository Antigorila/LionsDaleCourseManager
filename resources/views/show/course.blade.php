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
                    @if ($course->chapters->count() > 0)
                        <h3 class="m-2">Chapters:</h3>
                    @elseif(Auth::user()->id == 1)
                        <form action="{{ route('chapters.createView', $course) }}" method="GET">
                            <button type="submit" class="btn btn-info m-2">Add chapter</button>
                        </form>
                    @else
                        <h3 class="m-2">There is no any chapter yet...</h3>
                    @endif
                    
                    @foreach($course->chapters as $chapter)
                    <div class="text-dark-emphasis bg-dark border rounded-3">
                        <div class="card m-1">
                            <div class="card-body rounded">
                                <h4 class="card-title">{{ $chapter->title }}</h4>
                                <p class="card-text">{{ $chapter->content }}</p>
                                <div class="card">
                                    <div class="card-body col-12 rounded bg-dark">
                                        @foreach ($chapter->questions as $index => $question)
                                            <h5 class="card-title text-white">{{ $question->question }}</h5>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Answer:</span>
                                                </div>
                                                <input type="text" class="form-control" id="answer{{ $index }}" aria-describedby="basic-addon1">
                                            </div>
                                            <button class="btn btn-info m-2 check-answer" data-index="{{ $index }}" data-correct-answer="{{ $question->answer }}">Check</button>  
                                            <button class="btn btn-info m-2 show-answer" data-index="{{ $index }}" data-correct-answer="{{ $question->answer }}">Show answer</button>  
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
    document.addEventListener('click', function(event) {
        var target = event.target;
        
        if (target.classList.contains('check-answer')) {
            var index = target.getAttribute('data-index');
            var userAnswer = document.querySelector('#answer' + index).value;
            var correctAnswer = target.getAttribute('data-correct-answer');

            if (userAnswer === correctAnswer) {
                alert('Correct!');
            } else {
                alert('Wrong!');
            }
        }

        if (target.classList.contains('show-answer')) {
            var correctAnswer = target.getAttribute('data-correct-answer');
            alert(correctAnswer);
        }
    });
</script>
@endsection
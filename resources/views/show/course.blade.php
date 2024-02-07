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
                        <div class="grid-container">
                          <p class="card-text">{{ $course->description }}</p>
                          <div class="littlecard">
                            <h5>Chapters in {{ $course->name }}</h5>
                            <div class="card__container">
                                @if ($course->chapters->count() > 0)
                                    @foreach ($course->chapters as $chapter)
                                    <p class="element" onclick="scroll_to_div('{{ $chapter->id }}')">{{ $chapter->title }}</p>
                                    @endforeach
                                @else
                                    <p class="element active">This chapter is empty</p> 
                                @endif
                            </div>
                        </div>
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
                    <div class="text-dark-emphasis bg-dark border rounded-3" id="{{ $chapter->id }}">
                        <div class="card m-1">
                            <div class="card-body rounded">
                                <h4 class="card-title">{{ $chapter->title }}</h4>
                                <p class="card-text">{{ $chapter->content }}</p>
                                <div class="card">
                                    <div class="card-body col-12 rounded bg-dark">
                                        @foreach ($chapter->questions as $index => $question)
                                            <h5 class="card-title text-white">{{ $question->question }}</h5>
                                            @if (Auth::user()->doneTasks()->pluck('question_id')->contains($question->id))

                                            <div class="card text-white bg-success mb-3">
                                                <div class="card-body">
                                                    <h5>This question already answered!</h5>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Answer:</span>
                                                        </div>
                                                        <input type="text" class="form-control" id="answer{{ $index }}" aria-describedby="basic-addon1" placeholder="{{ $question->answer }}">
                                                    </div>
                                                    <button class="btn btn-info m-2 check-answer" data-index="{{ $index }}" data-correct-answer="{{ $question->answer }}">Check</button>  
                                                    <a class="btn btn-info m-2 show-answer" data-index="{{ $index }}" data-correct-answer="{{ $question->answer }}">Show answer</a> 
                                                </div>
                                              </div>
                                            @else
                                            <form action="{{ route('done_tasks.store') }}" method="POST">
                                                @csrf
                                                @method('POST')
                                                    <input type="text" class="form-control" id="answer" name="answer" aria-describedby="basic-addon1" placeholder="Answer">
                                                    <input hidden name="question_id" id="question_id" value="{{ $question->id }}">
                                                    <input hidden name="course_id" id="course_id" value="{{ $course->id }}">
                                                    <button type="submit" class="btn btn-info m-2 check-answer">Check</button>
                                                </form>
                                                <button class="btn btn-info m-2 show-answer" data-index="{{ $index }}" data-correct-answer="{{ $question->answer }}" style="margin-left: 10px;">Show answer</button>      
                                            @endif
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
                toastr.success('Correct!');
            } else {
                toastr.error('Wrong!');
            }
        }

        if (target.classList.contains('show-answer')) {
            var correctAnswer = target.getAttribute('data-correct-answer');
            toastr.info(correctAnswer, "Correct answer:");
        }
    });

    function scroll_to_div (id) 
    {
        var div = document.getElementById (id);
        if (div) 
        {
            div.scrollIntoView ();
        }
    }


</script>
@endsection
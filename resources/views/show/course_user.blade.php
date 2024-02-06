@section('content')
@extends('layouts.app')
<div class="m-4">
    <div class="text-dark-emphasis bg-dark border rounded-3 border-dark">
        <div class="m-2 text-white border-dark">
            <h4 class="card-title">Students on the course</h4>        
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Seen course</th>
                            <th scope="col">Completed course</th>
                            <th scope="col">Suspend</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($course->user_course as $kurzus)
                        <tr>
                            <th scope="row">{{ $kurzus->student->id }}</th>
                            <td>{{ $kurzus->student->fullname }}</td>
                            <td>
                            <form action="{{ route('users.updateActivity', $kurzus->student) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                @if ($kurzus->student->activity)
                                    <button class="btn btn-info px-3" style="width: 100px" type="submit">Active</button>
                                @else
                                    <button class="btn btn-dark px-3" style="width: 100px" type="submit">Inactive</button>
                                @endif
                            </form>
                            </td>

                            <td>
                                <form action="{{ route('course_users.updateActivity', $kurzus) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if ($kurzus->seen)
                                        <button class="btn btn-info px-3" style="width: 100px" type="submit">Seen</button>
                                    @else
                                        <button class="btn btn-dark px-3" style="width: 100px" type="submit">Unseen</button>
                                    @endif
                                </form>
                            </td>              
                            
                            <td>
                                <form action="{{ route('course_users.updateCompleted', $kurzus) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if ($kurzus->completed)
                                        <button class="btn btn-info px-3" style="width: 150px" type="submit">Completed</button>
                                    @else
                                        <button class="btn btn-dark px-3" style="width: 150px" type="submit">Uncompleted</button>
                                    @endif
                                </form>
                            </td> 

                            <td>
                                <form action="{{ route('course_users.destroy', $kurzus) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger px-3" style="width: 100px" type="submit">Suspend</button>
                                </form>
                            </td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
      </div>
    </div>
</div>
@endsection



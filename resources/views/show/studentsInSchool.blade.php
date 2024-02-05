@section('content')
@extends('layouts.app')

<div class="m-4">
    <div class="text-dark-emphasis bg-dark border rounded-3 border-dark">
        <div class="m-2 text-white border-dark">
            <h4 class="card-title">Students in {{ $school->name }}</h4>
            <div class="card">
                    
                @if ($school->student->count() > 0)
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Activity</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($school->student as $student)
                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{ $student->fullname }}</td>

                                <td>
                                <form action="{{ route('users.updateActivity', $student) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    @if ($student->activity)
                                        <button class="btn btn-info rounded-pill px-3" style="width: 100px" type="submit">Active</button>
                                    @else
                                        <button class="btn btn-dark rounded-pill px-3" style="width: 100px" type="submit">Inactive</button>
                                    @endif
                                </form>
                                </td>

                                <td>
                                <form action="{{ route('users.destroy', $student) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger rounded-pill px-3" style="width: 100px" type="submit">Delete</button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <div class="d-flex justify-content-center">
                    <i class="m-2">There is no students yet...</i>
                </div>
                @endif
            </div>
        </div>
      </div>
    </div>
</div>

@endsection
@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="row">
            <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
                <form action="{{ route('types.create') }}" method="GET">
                <div class="row m-2">     
                        <button type="submit" class="btn btn-info">Add new type</button>   
                    </div>
                </form>
            </div>
        </div>
        @foreach (\App\Models\Type::all() as $type)
            <div class="row">
                <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title text-white">{{ $type->type }}</h4>
                                <form action="{{ route('types.edit', $type) }}" method="GET">
                                    <button type="submit" class="btn btn-info m-2">Edit</button>
                                </form>                        
                            </div>
                            <hr class="text-white">
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="text-white">{{ $type->slug }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
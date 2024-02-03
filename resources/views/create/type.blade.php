@section('content')
@extends('layouts.app')
<div class="container">
    <div class="row">
        <div class="row">
            <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
                <div class="row">
                    <div class="col">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title text-white">Create new type</h4>                       
                        </div>
                        <hr class="text-white">
                    </div>
                </div>
                <form action="{{ route('types.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <label for="type" class="form-label text-white">Type name:</label>
                    <input name="type" id="type" class="form-control mb-3" placeholder="Type name">    
                    <hr class="text-white">  
                    <label for="slug" class="form-label text-white">Type slug:</label>
                    <input name="slug" id="slug" class="form-control mb-3" placeholder="Type slug">
                    <hr class="text-white">
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
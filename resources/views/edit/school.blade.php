@section('content')
@extends('layouts.app')
<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="col">
                    <h4 class="card-title text-white">Modify: {{ $school->name }}</h4>
                    <hr class="text-white">
                </div>
            </div>
            <form action="{{ route('schools.update', $school) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <label for="name" class="form-label text-white">School name:</label>
                    <input name="name" id="name" class="form-control mb-3" value="{{ $school->name }}">    
                    <hr class="text-white">  
                    <label for="contact_name" class="form-label text-white">Contact name:</label>
                    <input name="contact_name" id="contact_name" class="form-control mb-3" value="{{ $school->contact_name }}">   
                    <hr class="text-white">      
                    <label for="contact_email" class="form-label text-white">Contact email:</label>
                    <input name="contact_email" id="contact_email" class="form-control mb-3" value="{{ $school->contact_email }}">  
                    <hr class="text-white">           
                    <label for="address" class="form-label text-white">School address:</label>
                    <input name="address" id="address" class="form-control mb-3" value="{{ $school->address }}">
                    <hr class="text-white">  
                </div>       
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info">Save</button>
                </div>
            </form>
            
        </div>
    </div>
</div>
 
@endsection
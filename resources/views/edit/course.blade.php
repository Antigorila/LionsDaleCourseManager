@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
            <div class="row">
                <div class="row">
                    <h4 class="card-title text-white">Modify: {{ $course->name }}</h4>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                    <hr class="text-white">
                </div>
            </div>
            <form action="#" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <label for="name" class="form-label text-white">Course name:</label>
                    <input name="name" id="name" class="form-control mb-3" value="">    
                    <hr class="text-white">  
                    <label for="contact_name" class="form-label text-white">Level:</label>
                    <input name="contact_name" id="contact_name" class="form-control mb-3" value="">   
                    <hr class="text-white">      
                    <label for="contact_email" class="form-label text-white">Description:</label>
                    <input name="contact_email" id="contact_email" class="form-control mb-3" value="">           
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
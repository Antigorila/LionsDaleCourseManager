@section('content')
@extends('layouts.app')

<div class="container">
    <div class="row">
        <div class="row">
            <div class="text-dark-emphasis bg-dark border border-dark rounded-3 m-4 p-4">
                <div class="row">
                    <div class="col">
                        <h4 class="card-title text-white">Add a new school</h4>
                    </div>
                </div>
                <form action="{{ route('schools.store') }}" method="POST" class="m-2">
                    <div class="card-body">
                        @csrf
                        @method('POST')
                            <hr class="text-white"> 
                            <label for="name" class="form-label text-white">School name:</label>
                                <input name="name" id="name" class="form-control mb-3" placeholder="School name">    
                            <label for="contact_name" class="form-label text-white">Contact name:</label>
                                <input name="contact_name" id="contact_name" class="form-control mb-3" placeholder="Contact name">
                            <label for="contact_email" class="form-label text-white">Conact email:</label>
                                <input name="contact_email" id="contact_email" class="form-control mb-3" placeholder="Contact email">
                            <label for="address" class="form-label text-white">Address:</label>
                                <input name="address" id="address" class="form-control mb-3" placeholder="Address"> 
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-info m-2">Save</button>
                            </div>
                        <hr class="text-white"> 
                    </div>
                </form>     
            </div>
        </div>
    </div>
</div>

@endsection
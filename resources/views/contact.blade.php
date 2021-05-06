@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__("Contact Us")}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Contact Us
    </li>
@endsection

{{-- Content --}}
@section('content')
<div class="contact-section">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="contact-form">
                <form action="{{route('contact.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" required placeholder="Type Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required placeholder="Type Your Email">
                    </div>
                    <div class="form-group">
                        <label for="description">Description / Your Opinion</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn " type="submit">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

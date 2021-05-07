@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{$user->name}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item">
        Profile
    </li>
    <li class="breadcrumb-item">
        Setting
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        {{$user->name}}
    </li>
@endsection

{{-- Content --}}
@section('content')
<div class="profile-section">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="profile-form">
                <form action="{{route('profile.update', ['profile', $user->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{-- Name --}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" id="name" type="text" name="name" required value="{{$user->name}}" placeholder="Type Your Name">
                    </div>
                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" type="email" name="email" required value="{{$user->email}}" placeholder="Type Your Email">
                    </div>
                    {{-- Password --}}
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control" id="password" type="password" name="password" value="{{$user->email}}" placeholder="Type Your Password">
                    </div>
                    {{-- Confirm Password --}}
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input class="form-control" id="confirm_password" type="password" name="password" value="{{$user->email}}" placeholder="Confirm Your Password">
                    </div>
                    {{-- Gender --}}
                    <div class="form-group">
                        <label for="gender">Male / Female</label>
                        <input class="form-control" id="gender" type="text" name="gender" value="{{$user->profile->gender}}" placeholder="Male / Female">
                    </div>
                    {{-- Address --}}
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input class="form-control" id="address" type="text" name="address" value="{{$user->profile->address}}" placeholder="Type Your Address">
                    </div>
                    {{-- Facebook URL --}}
                    <div class="form-group">
                        <label for="facebook_url">Facebook URL</label>
                        <input class="form-control" id="facebook_url" type="text" name="facebook_url" value="{{$user->profile->facebook_url}}" placeholder="Type Your Facebook URL">
                    </div>
                    {{-- Linkedin URL --}}
                    <div class="form-group">
                        <label for="linkedin_url">Linkedin URL</label>
                        <input class="form-control" id="linkedin_url" type="text" name="linkedin_url" value="{{$user->profile->facebook_url}}" placeholder="Type Your Linkedin URL">
                    </div>

                    {{-- Bio --}}
                    <div class="form-group">
                        <label for="description">Bio</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{$user->profile->bio}}</textarea>
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

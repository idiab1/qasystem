@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{-- {{$user->name}} --}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item">
        Profile
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        {{-- {{$user->name}} --}}
    </li>
@endsection

{{-- Content --}}
@section('content')

@endsection

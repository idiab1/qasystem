@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__("Create post")}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('posts.index')}}">Posts</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Create new post
    </li>
@endsection

{{-- Content --}}
@section('content')
<section class="posts-section post-create">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="post-form">
                <form action="{{route("post.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" type="text" id="title" name="title" required placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="10" placeholder="Type your description for posts"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Choose Image</label>
                        <input class="form-control" type="file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-post" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{$post->title}}
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
        {{$post->title}}
    </li>
@endsection

{{-- Content --}}
@section('content')

<!-- Show posts -->
<section class="posts-section post-show">
    <div class="row">
        <div class="col-md-9 m-auto">
            <div class="card post my-3">
                <div class="card-header post-header">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-title">{{$post->title}}</h5>
                            <ul class="list-unstyled">
                                <li class="item">{{$post->user->name}} | </li>
                                <li class="item"><i class="fas fa-globe"></i> {{$post->created_at->diffForhumans()}}</li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{route('post.show', ['post' => $post->slug])}}">View</a>
                                    <a class="dropdown-item" href="{{route('post.edit', ['post' => $post->id])}}">Edit</a>
                                    <a class="dropdown-item" href="#">Archive</a>
                                    <form action="{{route('post.destroy', ['post' => $post->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="dropdown-item" type="submit">Delete</button>
                                    </form>
                                    {{-- <a class="dropdown-item" href="{{route('post.destroy')}}">Delete</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body post-body">
                    @if ($post->image)
                        <div class="post-image">
                            <img  class="card-img-top" src="{{URL::asset($post->image)}}" alt="...">
                        </div>
                    @endif
                    <p class="text-card description">{{$post->description}}</p>
                </div>

                {{-- <div class="card-footer post-footer">
                    <div class="row">
                        <div class="col-md-9">
                            <a href="">
                                <i class="fas fa-comments"></i>
                                <span>5</span>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{route("post.show", ['post' => $post->slug])}}" class="btn btn-gray">
                                <i class="fas fa-arrow-right"></i>
                                <span>More</span>
                            </a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- End of show posts -->

<!-- Comments for posts -->
<section class="comments-section">
    <div class="row">
        <div class="col-md-9 m-auto">
            <div class="comments-info">
                <h2>Comments <span class="comments-count">(5)</span></h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 m-auto">
            <div class="comments-section-content">
                <div class="card comment mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="comment-replay">
                                <ul class="list-unstyled">
                                    <li class="item">12 Feb 2021 &VerticalBar; </li>
                                    <li class="item">
                                        <a href="">Replay</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of comments for posts -->

<!-- Comments form -->
<section class="comments-form-section">
    <div class="row">
        <div class="col-md-9 m-auto">
            <div class="comments-info">
                <h2>Leave Your Comment</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9 m-auto">
            <div class="comments-form">
                <form action="{{route('comment.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="description">Comment</label>
                        <textarea class="form-control" id="description" name="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn-comment btn" type="submit">Publish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End of comments form -->
@endsection

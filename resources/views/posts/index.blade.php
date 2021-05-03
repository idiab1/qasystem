@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{__("Our Blog")}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-items')
    <li class="breadcrumb-item">
        <a href="{{route('home')}}">Home</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Posts
    </li>
@endsection

{{-- Content --}}
@section('content')
<section class="posts-section">
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-md-4">
                <div class="card post my-3">
                    @if ($post->image)
                        <div class="card-header post-header">
                            <img  class="card-img-top" src="{{URL::asset($post->image)}}" alt="...">
                        </div>
                    @endif
                    <div class="card-body post-body">
                        <div class="row">
                            <div class="col-md-9">
                                <h5 class="card-title">{{$post->title}}</h5>
                                <ul class="list-unstyled">
                                    <li class="item">{{$post->user->name}} | </li>
                                    <li class="item"><i class="fas fa-globe"></i> {{$post->created_at->diffForhumans()}}</li>
                                </ul>
                            </div>
                            <div class="col-md-3">
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
                    <div class="card-footer post-footer">
                        <div class="row">
                            <div class="col-md-9">
                                <a href="">
                                    <i class="fas fa-comments"></i>
                                    <span>{{$countComment}}</span>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="{{route("post.show", ['post' => $post->slug])}}" class="btn btn-gray">
                                    <i class="fas fa-arrow-right"></i>
                                    <span>More</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection

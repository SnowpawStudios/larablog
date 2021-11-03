@extends('layouts.app')

@section('content')
    
    <div class="main-content">
        <p >This is the show single post page</p>
        <div class="post-show">
            <h5 class="post-title">{{$post->title}}</h5>
            <p class="post-body">{{$post->body}}</p>

            <a href="{{route('posts.edit', ['post' =>$post])}}"  class='edit-btn'>EDIT</a>
        
            <div class="back-link">
                <a href="{{route('posts.index')}}">Back to posts index</a>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <p>This is the show single post page</p>
    <div class="">
        <h5>{{$post->title}}</h5>
        <p>{{$post->body}}</p>
    </div>
    <div>
        <a href="{{route('posts.index')}}">Back to posts index</a>
    </div>
@endsection
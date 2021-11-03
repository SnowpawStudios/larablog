@extends('layouts.app')

@section('content')
    <p>This is the show single post page</p>
    <div class="">
        <h5>{{$post->title}}</h5>
        <p>{{$post->body}}</p>
        <a href="{{route('posts.edit', ['post' =>$post])}}" style="border: 1px solid black; padding: 2px 6px">EDIT</a>
    </div>
    <div style="margin-top: 1em;">
        <a href="{{route('posts.index')}}">Back to posts index</a>
    </div>
@endsection
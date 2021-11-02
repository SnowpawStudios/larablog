@extends('layouts.app')

@section('content')
    <p>This is the posts index page</p>
    <div class="">
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</a></li>
                <form action="">Delete</form>
            @endforeach
        </ul>
    </div>
   
@endsection
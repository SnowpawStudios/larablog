@extends('layouts.app')

@section('content')
    <p>This is the posts index page</p>
    <div class="">
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></li>
                <form action="{{route('posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE">
                    
                </form>
            @endforeach
        </ul>
    </div>
   
@endsection
@extends('layouts.app')

@section('content')
    
    <div class="main-content">
        <p>This is the posts index page</p>
        <ul>
            @foreach ($posts as $post)
            <div class="post-list-item">
                <li class="post-list-name"><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></li>
                <form class="delete-btn-form" action="{{route('posts.destroy', $post)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="DELETE" class="delete-btn">                    
                </form>
            </div>
            @endforeach
        </ul>
    </div>
   
@endsection
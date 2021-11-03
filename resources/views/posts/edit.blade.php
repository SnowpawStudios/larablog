@extends('layouts.app')

@section('content')
    This is the EDIT posts page
    <div>
        {{-- {{route('posts.update')}} --}}
        <form action="{{route('posts.update', $post)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="title">Post title</label>
            <input class="form-input" type="text" name="title" id="title" value = "{{old('title',$post->title)}}">
            @error('title')
                <div class="" style="color: red;" >{{$message}}</div>
            @enderror
            <label for="body">Write your post here</label>
            <textarea name="body" id="body" cols="30" rows="10">{{old('body', $post->body)}}</textarea>
            @error('body')
                <div class="" style="color: red;">{{$message}}</div>
            @enderror
            <button type="submit">Update</button>
        </form>
    </div>
@endsection
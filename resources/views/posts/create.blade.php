@extends('layouts.app')

@section('content')
    This is the create posts page
    <div>
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <label for="title">Post title</label> <br>
            <input type="text" name="title" id="title" value = "{{old('title')}}"><br>
            @error('title')
                <div class="" style="color: red;" >{{$message}}</div>
            @enderror
            <label for="body">Write your post here</label><br>
            <textarea name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea><br>
            @error('body')
                <div class="" style="color: red;">{{$message}}</div>
            @enderror
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
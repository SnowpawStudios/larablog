@extends('layouts.app')

@section('content')
    
    <div class="main-content">
        This is the create posts page
        <form action="{{route('posts.store')}}" method="POST">
            @csrf
            <label for="title">Post title</label> 
            <input class="form-input" type="text" name="title" id="title" value = "{{old('title')}}">
            @error('title')
                <div class="" style="color: red;" >{{$message}}</div>
            @enderror
            <label for="body">Write your post here</label>
            <textarea name="body" id="body" cols="30" rows="10">{{old('body')}}</textarea>
            @error('body')
                <div class="" style="color: red;">{{$message}}</div>
            @enderror
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
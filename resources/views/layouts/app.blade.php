<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>LaraBlog</h1>
        <nav>
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('posts.index')}}">Posts</a></li>
                <li><a href="{{route('posts.create')}}">Create Post</a></li>
            </ul>
        </nav>
    </header>
    <div class="">
        
        @if (session('status'))
        <p style="background: red; color:white;">
            {{session('status')}}
        </p>
        @endif
    </div>
    @yield('content')

    <footer>
        <p>This is the footer</p>
    </footer>
</body>
</html>
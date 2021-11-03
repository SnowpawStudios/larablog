<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/main.css">

</head>
<body>
    <header>           
        <nav>
            <h1>LaraBlog</h1>
            <ul class="nav-list">
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('posts.index')}}">Posts</a></li>
                <li><a href="{{route('posts.create')}}">Create Post</a></li>
            </ul>
        </nav>       
    </header>
    <div class="content">
        
        @if (session('status'))
        <div class="flash-error" style="background: red; color:white;">
            {{session('status')}}
        </div>
        @endif
    
        @yield('content')
    </div>

    <footer>
        <p>This is the footer</p>
    </footer>
    
</body>
</html>
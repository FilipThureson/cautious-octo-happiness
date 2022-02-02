<!DOCTYPE html>
<html lang="en">
<head>
    <x-head />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body>
    <x-nav />
    <main>
        <div class="posts">
            @foreach ($posts as $post)
            <div class="post">
                <h3><a href="/posts/{{ $post->id }}">{{$post->title}}</a></h3>
                {!! $post->blog !!}
                <span>
                    -{{$post->name}}
                    : {{$post->created_at}}
                </span>
            </div>
            @endforeach
        </div>
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <x-head />
    <link rel="stylesheet" href="{{ asset('css/singlePost.css') }}">
</head>
<body>
    <x-nav />
    <main >
        <div class="post">
            <h1>{{$post->title}}</h1>
            {!! $post->blog !!}
            <span>
                -{{$post->name}}
                : {{$post->created_at}}
            @if (Session::get('email') === $post->email)
                <form action="/api/deletePost" method="post">
                    <input type="hidden" name="id" value="{{$post->id}}"/>
                    <button type="submit">&#128465;</button>
                </form>
            @endif
            </span>
            <button class="respond" id="btn{{$post->id}}">Kommentera!</button>
        </div>
        <div class="commentsWrapper" id="comment{{$post->id}}">
        </div>
    </main>
    <div id="responseWrapper">
        <form id="responseForm" action="/api/respond" method="post">
            <input name="parent" id="responseParent" type="hidden">
            @if (Session::get('name'))
                <textarea type="text" name="blog" cols="30" rows="10"></textarea>
                <input type="hidden" name="email" value="{{Session::get('email')}}">
                <button type="submit">Skicka!</button>
            @else
                <textarea type="text" name="blog" cols="30" rows="10"></textarea>
                <input type="hidden" name="email" value="johndoe@example.com">
                <button type="submit">Skicka!</button>
            @endif
        </form>
    </div>
    <script src="{{ asset('js/singlePost.js') }}"></script>
</body>
</html>

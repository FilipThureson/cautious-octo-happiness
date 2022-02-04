<!DOCTYPE html>
<html lang="en">
<head>
    <x-head />
    <link rel="stylesheet" href="{{ asset('css/newPost.css') }}">
</head>
<body>
    <x-nav />
    @if ($notLoggedIn)
        <main class="notLoggedInMain">
            Du Måste Logga in för att publicera ett inlägg!
        </main>
    @else
        <main class="loggedInMain">
            <form action="/api/newPost" method="POST" class="formNewPost">
                @csrf
                <label for="title">Rubrik</label>
                <input type="text" name="title" id="title">
                <label for="text">Inläggs text</label>
                <textarea name="postText" id="text" cols="10" rows="20"></textarea>
                <button type="submit">Lägg upp!</button>
            </form>
        </main>
    @endif
    <script src="https://cdn.tiny.cloud/1/fsua0ssfdpv74dcehnti9bto8m8q0u2ddzpc5c71y2cihi5k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('js/newPost.js') }}"></script>
</body>
</html>

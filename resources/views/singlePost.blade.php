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
            <h1>{{$post[0]->title}}</h1>
            {!! $post[0]->blog !!}
            <span>
                -{{$post[0]->name}}
                : {{$post[0]->created_at}}
            </span>
            <button class="respond" id="btn{{$post[0]->id}}">Kommentera!</button>
        </div>
        <div class="commentsWrapper" id="comment{{$post[0]->id}}">
            <!--
            <div class="comment indent1">
                <h3>Name Place</h3>
                <p>This is the comment: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam ut possimus optio error asperiores voluptatum? Expedita laborum quo iusto sit ullam atque, quis exercitationem accusamus officia? Eos pariatur autem veritatis odio iure molestias at optio, consectetur impedit ex aperiam distinctio fugiat, laborum ut eaque explicabo debitis, aliquam cumque nemo porro?</p>
                <p>2021-15-21 23:24:11</p>
            </div>
            <div class="comment indent2">
                <h3>Name Place</h3>
                <p>This is the comment: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam ut possimus optio error asperiores voluptatum? Expedita laborum quo iusto sit ullam atque, quis exercitationem accusamus officia? Eos pariatur autem veritatis odio iure molestias at optio, consectetur impedit ex aperiam distinctio fugiat, laborum ut eaque explicabo debitis, aliquam cumque nemo porro?</p>
                <p>2021-15-21 23:24:11</p>
            </div>
            <div class="comment indent1">
                <h3>Name Place</h3>
                <p>This is the comment: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam ut possimus optio error asperiores voluptatum? Expedita laborum quo iusto sit ullam atque, quis exercitationem accusamus officia? Eos pariatur autem veritatis odio iure molestias at optio, consectetur impedit ex aperiam distinctio fugiat, laborum ut eaque explicabo debitis, aliquam cumque nemo porro?</p>
                <p>2021-15-21 23:24:11</p>
            </div>
            <div class="comment indent1">
                <h3>Name Place</h3>
                <p>This is the comment: Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam ut possimus optio error asperiores voluptatum? Expedita laborum quo iusto sit ullam atque, quis exercitationem accusamus officia? Eos pariatur autem veritatis odio iure molestias at optio, consectetur impedit ex aperiam distinctio fugiat, laborum ut eaque explicabo debitis, aliquam cumque nemo porro?</p>
                <p>2021-15-21 23:24:11</p>
            </div>
        -->
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

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
        </div>
        <div class="commentsWrapper">
            @foreach ($comments as $comment)
                <div>
                    {{var_dump($comment)}}
                </div>
            @endforeach
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
</body>
</html>

<link rel="stylesheet" href="">
<header>
    <h2><a href="/">Blogg</a></h2>
    <nav>
        <ul>
            <li class="searchField">
                <i class="fa fa-search"></i>
                <input type="text" placeholder="Search.." name="search">
            </li>
            @if (Session::get('name'))
                <li><a href="/newPost">New Post</a></li>
                <li><a href="#">My Posts</a></li>
                <li><a href="/api/logout">Logout</a></li>
            @else
            <li><a href="/login">Login</a></li>
            <li><a href="/signup">Sign up</a></li>
            @endif
        </ul>
    </nav>
</header>

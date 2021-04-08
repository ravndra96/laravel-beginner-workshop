
<nav class="navbar navbar-expand-lg navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="#">Social Network</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">


            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php
                // if user logged in show home,posts,likes,newsfeed page
                if (Auth::check()) {
                    ?>
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::path() == '/' ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/my_posts" class="nav-link {{ Request::path() == 'my_posts' ? 'active' : '' }}">My Posts</a>
                    </li>
                    <li class="nav-item">
                        <a href="/my_likes" class="nav-link {{ Request::path() == 'my_likes' ? 'active' : '' }}">My likes</a>
                    </li>
                    <li class="nav-item">
                        <a href="/newsfeed?page=1&limit=4" class="nav-link {{ Request::path() == 'newsfeed' ? 'active' : '' }}">News feed</a>
                    </li>
                    <li class="nav-item">
                        <a href="/logout" class="nav-link">Logout</a>
                    </li>
                    <?php
                }
                // if not show login,register,newsfeed page
                else {
                    ?>
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ Request::path() == '/' ? 'active' : '' }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ Request::path() == 'login' ? 'active' : '' }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link {{ Request::path() == 'register' ? 'active' : '' }}">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="/newsfeed?page=1&limit=4" class="nav-link {{ Request::path() == 'newsfeed' ? 'active' : '' }}">News feed</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>


<div class="links">
    <?php
    if (Auth::check()) {
        ?>
        <a href="/" class="{{ Request::path() == '/' ? 'active' : '' }}">Home</a>
        <a href="/my_posts" class="{{ Request::path() == 'my_posts' ? 'active' : '' }}">My Posts</a>
        <a href="/my_likes" class="{{ Request::path() == 'my_likes' ? 'active' : '' }}">My likes</a>
        <a href="/newsfeed" class="{{ Request::path() == 'newsfeed' ? 'active' : '' }}">News feed</a>
        <a href="/logout" >Logout</a>
        <?php
    } else {
        ?>
        <a href="/login" class="{{ Request::path() == 'login' ? 'active' : '' }}">Login</a>
        <a href="/register" class="{{ Request::path() == 'register' ? 'active' : '' }}">Register</a>
        <a href="/newsfeed" class="{{ Request::path() == 'newsfeed' ? 'active' : '' }}">News feed</a>
        <?php
    }
    ?>
</div>

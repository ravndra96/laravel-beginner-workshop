<html>
    <head>
        <title>register</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <!-- Load styles -->
        <style></style>
    </head>
    <body>
        <form method="post" action="{{ url('register') }}">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            @csrf
        </form>

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <!-- Load JavaScript -->
        <script></script>
    </body>
</html>

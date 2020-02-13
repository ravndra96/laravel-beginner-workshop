# remove unwanted files and code
1. remove packages.json file
2. remove webpack.mix.js file
3. remove default navigations and add three routes.

# create main layout file for default html structure to display content in all files.

1. create layout/main.blade.php
2. @extends('layout.main') extend it to display in all routes.
3. @section('content') for display page content @endsection
4. copy welcome.blade.php to pages directory in views.
5. change app name in env file and use it in welcome page.

# start workflow regarding registration.

1. create register view page.
    1.1. create register form. and explain csrf cross-site request forgery security option for post method 
2. create register route.
3. create register controller.
4. create validation 
5. save user 
6. login user directly
7. redirect user to dashboard

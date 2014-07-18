<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('meta-title', 'Larabook')</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    {{{ HTML::style('css/main.css') }}}
</head>
<body>

    @include('layouts.partials.topnav')

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>

    <!-- jQuery CDN -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    {{{ HTML::script('js/app.js') }}}
</body>
</html>

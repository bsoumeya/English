<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" type="image/ico" href="favicon.ico">

        <!-- Local -->
        <link rel="stylesheet" type="text/css" href="/css/raw.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        @yield('stylesheets')
    </head>
    <body>

        @include("layouts.navigation")

        <div class="app-wrapper">
            @yield("content")
            @include('partials.message')
        </div>

        <div class="fluid container">
            @include('partials.errors')
        </div>

        <div class="footer">
            @if (Session::get('original_user'))
                <a class="mini ui button violet right floated" href="/users/switch-back">Return to your Login</a>
            @endif
            <p>&copy; {!! date('Y'); !!} <a href="">You</a></p>
        </div>

        <script type="text/javascript">
            var _token = '{!! Session::token() !!}';
            var _url = '{!! url("/") !!}';
        </script>
        @yield("pre-javascript")
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js"></script>
        @yield("scripts")
    </body>
</html>

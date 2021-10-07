<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shortify</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Javascript -->

        <script src="js/app.js"></script>

        <!-- Styles -->
        <link href="/css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
            <div class="top-right links">
                <a href="/statistics/urls">Stats</a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    Shortify
                </div>

                <div class="links">
                    <form action="/" method="POST">
                        @csrf
                        <label for="originalurl"><b>Enter URL:</b></label>
                        <input type="text" name="originalurl" id="originalurl" size="60">
                        <input type="submit" value="Shortify it!">
                    </form>
                    <br>
                    @php
                        if (isset($shorturl)) {
                            echo "<p><b class='property'>Your short URL: <a href=".$shorturl." id='inputText'><nobr><h1>".$host.":8000/".$shorturl."</h1></a></b></p><br>";
                        }
                        if (isset($originalurl)) {
                            echo "<p><b>Original URL: <a href=".$originalurl.">".$originalurl."</a></b></p>";
                        }
                    @endphp
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                        <ul style="color: red;">
                            @foreach ($errors->all() as $error)
                            <li><b>{{ $error }}</b></li>
                            @endforeach
                        </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <footer class="flex-center">
            &copy; Copyright 2021 Shortify
        </footer>
    </body>
</html>

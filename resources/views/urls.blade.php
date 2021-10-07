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
        <div class="position-ref full-height">
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
                <a href="/">Home</a>
            </div>
            <div class="content">
                <div>
                    @foreach ($urls as $url)
                        <b>
                            <span><a href="/statistics/visits/{{ $url['shorturl'] }}">{{ $host }}/{{ $url['shorturl'] }} - {{ $url['originalurl'] }}</a></span>
                        </b>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>

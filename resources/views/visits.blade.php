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
                <a href="/statistics/urls">< URLs</a>
            </div>
            <div class="content">
                <h1>
                    {{ $host }}/{{ $shorturl }} <br><br><br>
                    Total redirected: {{ $quantity }} times
                </h1>
                <div>
                    @foreach ($visits as $visit)
                        <b>
                            <span class="property">DATE/TIME:</span> {{ $visit['created_at'] }}
                            <span class="property">IP ADDRESS:</span> {{ $visit['ip'] }}<br>
                            <span class="property">USER AGENT:</span> {{ $visit['useragent'] }}
                        </b>
                        <hr>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
    </body>
</html>

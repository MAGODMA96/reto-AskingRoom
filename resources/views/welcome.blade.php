<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LOVE FILMS</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{asset("css/custom.css")}}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height background">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/movie') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    welcome love movies
                </div>
                <p class="text">Here you will find all the <strong>love movies</strong> of 2020</p>
                <div class="links">
                    @auth
                        <a href="{{ url('/movie') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </body>
</html>

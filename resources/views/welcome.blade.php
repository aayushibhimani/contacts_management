<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
            padding-top: 10rem;
            padding-bottom: calc(10rem - 4.5rem);
            background: linear-gradient(to bottom, rgba(48, 59, 79, 0.8) 0%, rgba(48, 59, 79, 0.8) 100%), url("{{ asset('storage/contacts/homepage.jpg') }}");
            background-position: center top;
            background-size: 100% auto;
            }
            .center {
            margin: auto;
            width: 50%;
            /* border: 3px solid green; */
            padding: 10px;
            text-align: center;
            color: white;
            }
            h1{
                font-size: 56px;
            }
            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 20px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            
        </style>


    </head>
    <body>
        <header class="masthead">
            <div class="container center">
                <h1>My Contacts</h1>
                @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </header>
    </body>
</html>

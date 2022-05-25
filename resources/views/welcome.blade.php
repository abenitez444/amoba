<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
          <!-- Scripts -->
            <link href="{{ mix('js/app.js') }}" rel="stylesheet">
            <script src="https://cdn.tailwindcss.com"></script>
        
          <!-- Styles -->
          <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content bg-black">
                <div class="italic hover:not-italic text-center text-lg text-white">
                    Laravel + vue + tailwind css
                </div>
            </div>
        </div>
    </body>
</html>

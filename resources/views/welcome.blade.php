<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
          <!-- Styles -->
          <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('app') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Iniciar</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrar</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div id="app">
                <div class="content bg-black">
                    <login />
                </div>    
            </div>
        </div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>

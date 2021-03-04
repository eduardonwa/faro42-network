<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tweety</title>
        <link rel="stylesheet" href="css/app.css">
    </head>
    <body class="antialiased">

        <div class="flex flex-col h-screen w-screen relative md:flex-row">
            <div class="bg-gray-800 w-full h-full flex flex-col items-center justify-center md:w-auto">
                <img
                    src="/img/faro42-textless.svg" 
                    alt="Faro42 logo"
                    class="w-34 h-32"
                >
                <h3 class="font-bold text-white text-2xl text-center md:text-3xl md:p-4 lg:p-4">Faro 42 de Alcohólicos Anónimos</h3>
                <h4 class="text-gray-100">Área Sonora Sur #42</h4>
            </div>
            <div class="w-full h-full flex items-center flex-col bg-gray-200 pb-8 md:justify-center">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home Feed</a>
                @else
                    <p class="font-semibold text-center p-7 text-xl">
                        Trabajando para el alcohólico que nos necesita
                    </p>
                    <a href="{{ route('login') }}" class="flex items-center justify-center text-lg font-bold text-gray-100 mb-8 h-14 w-52 rounded-lg bg-blue-600">Ingresar</a>
                        <a href="{{ route('register') }}" class="flex items-center justify-center text-lg font-bold text-gray-100 h-14 w-52 rounded-lg bg-blue-600">Crea una cuenta</a>
                @endauth
            </div>
        </div>

    </body>
</html>
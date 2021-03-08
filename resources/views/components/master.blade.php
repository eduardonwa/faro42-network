<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="http://unpkg.com/turbolinks"></script>
    </head>
    <body>

        <div id="app">

            <section class="px-8 py-3 mb-4">
                <header class="container mx-auto">
                    <a href=" {{route ('home') }} ">
                        <img
                            src="/img/faro42.svg" 
                            alt="Faro42 logo"
                            class="w-32 h-28"
                        >
                    </a>
                </header>
            </section>
            {{ $slot }}

        </div>
        
    </body>
</html>
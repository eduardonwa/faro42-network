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
        @livewireStyles
    </head>
    <body>

        <div id="app">

            <section class="px-8 py-3 mb-4 mx-auto">
                <header class="flex flex-col items-center md:flex-row">
                    <a href=" {{route ('home') }} ">
                        <img
                            src="/img/faro42.svg" 
                            alt="Faro42 logo"
                            class="w-32 h-28"
                        >
                    </a>

                    @can('create_posts')
                        <div class="flex items-center md:justify-end justify-center w-full h-30 space-x-2 ">
                            <x-faro-actions type="create" redirect="create">
                                <svg 
                                    class="w-4 cursor-pointer mr-4"
                                    viewBox="0 0 20 20" 
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="white" fill-rule="evenodd">
                                        <g id="icon-shape">
                                            <path d="M2,4 L2,18 L16,18 L16,12 L18,10 L18,20 L17,20 L0,20 L0,19 L0,3 L0,2 L10,2 L8,4 L2,4 Z M12.2928932,3.70710678 L4,12 L4,16 L8,16 L16.2928932,7.70710678 L12.2928932,3.70710678 Z M13.7071068,2.29289322 L16,0 L20,4 L17.7071068,6.29289322 L13.7071068,2.29289322 Z" id="Combined-Shape"></path>
                                        </g>
                                    </g>
                                    </svg>
                                    Crear publicación
                            </x-faro-actions>
                            <x-faro-actions type="index" redirect="index">
                                <svg
                                    class="w-4 cursor-pointer mr-4"
                                    viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <g id="Page-1" stroke="none" stroke-width="1" fill="white" fill-rule="evenodd">
                                        <g id="icon-shape">
                                            <path d="M1,4 L3,4 L3,6 L1,6 L1,4 Z M5,4 L19,4 L19,6 L5,6 L5,4 Z M1,9 L3,9 L3,11 L1,11 L1,9 Z M5,9 L19,9 L19,11 L5,11 L5,9 Z M1,14 L3,14 L3,16 L1,16 L1,14 Z M5,14 L19,14 L19,16 L5,16 L5,14 Z" id="Combined-Shape"></path>
                                        </g>
                                    </g>
                                    </svg>
                                Publicaciones
                            </x-faro-actions>
                        </div>
                    @endcan

                </header>
            </section>
            {{ $slot }}

        </div>
        @livewireScripts
    </body>
</html>
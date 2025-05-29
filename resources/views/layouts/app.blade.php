<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Cambia a whiteBlue el indicador cuando su icono tiene la clase 'active' */
            #icon1.active #indicator1,
            #icon2.active #indicator2,
            #icon3.active #indicator3,
            #icon4.active #indicator4 {
                background-color: #E4F2F2;
                /* Cambiar a verde */
            }
        </style>

    </head>
    <div class="flex flex-col h-screen w-full">

        @include('layouts.header')

        @include('layouts.navigation')

        <!-- Page Content -->
        <main id="main-content" class="h-full w-full ml-0">
            {{ $slot }}
        </main>
    </div>
</html>

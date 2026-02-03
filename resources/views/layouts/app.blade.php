<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'BookTrackr') }}</title>

    <!-- Laravel Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Your custom styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>


<div>


    <!-- NAVBAR -->
    @include('layouts.navigation')

    <!-- PAGE CONTENT -->
    <main>
        @yield('content')
    </main>

</div>

<!-- FOOTER -->
<footer class="site-footer">
    © {{ date('Y') }} BookTracker. All rights reserved.
</footer>

</body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>


    </head>
    <body class="font-sans antialiased">
        @include('layouts.user.navigation')

        <main>
            @yield('content')
        </main>

        @include('layouts.user.footer')

     
    </body>
</html>

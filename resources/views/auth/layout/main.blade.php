<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} | @yield('title')</title>
        <link href="{{ mix('/css/auth.css') }}" rel="stylesheet">
        @yield('styles')
        <script src="{{ mix('/js/auth.js') }}"></script>
        @yield('scripts')
    </head>
    <body>
        @include('auth.include.header')

        <main class="py-4">
            @include('auth.include.messages')
            @yield('content')
        </main>
    </body>
</html>

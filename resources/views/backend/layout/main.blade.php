<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name') }} | @yield('title')</title>
        <link href="{{ mix('/css/backend.css') }}" rel="stylesheet">
        @yield('styles')
    </head>
    <body class="c-app">
        @include('backend.include.sidebar')
        <div class="c-wrapper">
            @include('backend.include.header')

            <div class="c-body">
                <main class="c-main">
                    <div class="container-fluid">
                        <div class="fade-in">
                            <section class="content-header">
                                @yield('header')
                            </section>

                            <section class="content">
                                @include('backend.include.messages')
                                @yield('content')
                            </section>
                        </div>
                    </div>
                </main>
                @include('backend.include.footer')
            </div>
        </div>

        <script src="{{ mix('/js/backend.js') }}"></script>
        <script src="{{ mix('/js/backend.sweetalert2.js') }}"></script>
        @yield('scripts')
    </body>
</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <title>@yield('meta_title') | {{ config('app.name') }}</title>
        <meta name="description" content="@yield('meta_description')">
        <meta name="keywords" content="@yield('meta_keywords')">
        <link href="{{ mix('/css/frontend.core.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/frontend.main.css') }}" rel="stylesheet">
        <link href="{{ mix('/css/frontend.header.css') }}" rel="stylesheet" media="(min-width: 1200px)">
        <link href="{{ mix('/css/frontend.mobile.css') }}" rel="stylesheet" media="(max-width: 1199px)">
        <link href="{{ url('/favicon.ico') }}" rel="icon" type="image/x-icon">
        @yield('styles')
{{--        <link rel="stylesheet" href="redparts/vendor/photoswipe/photoswipe.css">--}}
{{--        <link rel="stylesheet" href="redparts/vendor/photoswipe/default-skin/default-skin.css">--}}
    </head>
    <body>
<div class="container">
    @include('frontend.include.messages')

    @if(session('success'))
        <div class="alert alert-success">
            SESSION SUCCESS: {{ session('success') }}
        </div>
    @endif
</div>

        <div class="site">
            @include('frontend.include.header-mobile')
            @include('frontend.include.header')
            @yield('content')
            @include('frontend.include.footer')
        </div>

        @include('frontend.include.menu-mobile')
        @include('frontend.include.modal-quick-view')
        @include('frontend.include.modal-vehicle-add')
        @include('frontend.include.modal-vehicle-picker')
{{--        @include('frontend.include.modal-photo-swipe')--}}

        <script src="{{ mix('/js/frontend.core.js') }}"></script>
        <script src="/redparts/vendor/nouislider/nouislider.min.js"></script>
{{--        <script src="redparts/vendor/photoswipe/photoswipe.min.js"></script>--}}
{{--        <script src="redparts/vendor/photoswipe/photoswipe-ui-default.min.js"></script>--}}
        <script src="{{ mix('/js/frontend.main.js') }}"></script>
        <script src="{{ mix('/js/frontend.number.js') }}"></script>
        @yield('scripts')
    </body>
</html>

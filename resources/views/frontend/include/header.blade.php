<header class="site__header">
    <div class="header">
        @include('frontend.include.partials.header-topbar')
        @include('frontend.include.partials.header-navbar')
        @include('frontend.include.partials.header-logo')
        @include('frontend.include.partials.header-search')

        <div class="header__indicators">
{{--            @include('frontend.include.partials.header-wishlist')--}}
            @include('frontend.include.partials.header-account')
            @include('frontend.include.partials.header-cart')
        </div>
    </div>
</header>

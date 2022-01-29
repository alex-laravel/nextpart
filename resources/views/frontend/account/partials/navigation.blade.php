<div class="account-nav flex-grow-1">
    <h4 class="account-nav__title">{{ trans('labels.frontend.sidebar.navigation') }}</h4>

    <ul class="account-nav__list">
        <li class="account-nav__item {{ (request()->routeIs('frontend.account.dashboard')) ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('frontend.account.dashboard') }}">
                {{ trans('menus.frontend.header.account.dashboard') }}
            </a>
        </li>

        <li class="account-nav__item {{ (request()->routeIs('frontend.account.garage')) ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('frontend.account.garage') }}">
                {{ trans('menus.frontend.header.account.garage') }}
            </a>
        </li>

        <li class="account-nav__item {{ (request()->routeIs('frontend.account.orders')) ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('frontend.account.orders') }}">
                {{ trans('menus.frontend.header.account.orders') }}
            </a>
        </li>

        <li class="account-nav__item {{ (request()->routeIs('frontend.account.profile')) ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('frontend.account.profile') }}">
                {{ trans('menus.frontend.header.account.profile') }}
            </a>
        </li>

        <li class="account-nav__item {{ (request()->routeIs('frontend.account.password')) ? 'account-nav__item--active' : '' }}">
            <a href="{{ route('frontend.account.password') }}">
                {{ trans('menus.frontend.header.account.password') }}
            </a>
        </li>

        <li class="account-nav__divider" role="presentation"></li>

        <li class="account-nav__item ">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ trans('buttons.auth.logout') }}
            </a>
        </li>
    </ul>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</div>

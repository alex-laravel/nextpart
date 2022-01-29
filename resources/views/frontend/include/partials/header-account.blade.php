<div class="indicator indicator--trigger--click">
    <a href="account-login.html" class="indicator__button">
        <span class="indicator__icon">
            <svg width="32" height="32">
                <path d="M16,18C9.4,18,4,23.4,4,30H2c0-6.2,4-11.5,9.6-13.3C9.4,15.3,8,12.8,8,10c0-4.4,3.6-8,8-8s8,3.6,8,8c0,2.8-1.5,5.3-3.6,6.7C26,18.5,30,23.8,30,30h-2C28,23.4,22.6,18,16,18z M22,10c0-3.3-2.7-6-6-6s-6,2.7-6,6s2.7,6,6,6S22,13.3,22,10z" />
            </svg>
        </span>
        <span class="indicator__title">
            @guest
                {{ trans('labels.auth.login.title') }} / {{ trans('labels.auth.register.title') }}
            @else
                {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
            @endguest
        </span>
        <span class="indicator__value">{{ trans('labels.auth.title') }}</span>
    </a>
    <div class="indicator__content">
        <div class="account-menu">
            @guest
                <form class="account-menu__form" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="account-menu__form-title">
                        {{ trans('labels.auth.login.login_to_account') }}
                    </div>

                    <div class="form-group">
                        <label for="header-signin-email" class="sr-only">{{ trans('labels.auth.login.form.login') }}</label>
                        <input id="header-signin-email" class="form-control form-control-sm" type="email" name="email" placeholder="{{ trans('labels.auth.login.form.login') }}" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="header-signin-password" class="sr-only">{{ trans('labels.auth.login.form.password') }}</label>
                        <div class="account-menu__form-forgot">
                            <input id="header-signin-password" class="form-control form-control-sm" type="password" name="password" placeholder="{{ trans('labels.auth.login.form.password') }}">
                            <a href="{{ route('password.request') }}" class="account-menu__form-forgot-link">{{ trans('labels.auth.login.forgot_password') }}</a>
                        </div>
                    </div>

                    <div class="form-group account-menu__form-button">
                        <button type="submit" class="btn btn-primary btn-sm">{{ trans('buttons.auth.login') }}</button>
                    </div>

                    <div class="account-menu__form-link">
                        <a href="{{ route('register') }}">{{ trans('labels.auth.login.create_account') }}</a>
                    </div>
                </form>
            @else
                <div class="account-menu__divider"></div>
                <a href="" class="account-menu__user">
                    <div class="account-menu__user-avatar">
                        <img src="images/avatars/avatar-4.jpg" alt="">
                    </div>
                    <div class="account-menu__user-info">
                        <div class="account-menu__user-name">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</div>
                        <div class="account-menu__user-email">{{ auth()->user()->email }}</div>
                    </div>
                </a>

                <div class="account-menu__divider"></div>
                <ul class="account-menu__links">
                    <li><a href="{{ route('frontend.account.dashboard') }}">{{ trans('menus.frontend.header.account.dashboard') }}</a></li>
                    <li><a href="{{ route('frontend.account.garage') }}">{{ trans('menus.frontend.header.account.garage') }}</a></li>
                    <li><a href="{{ route('frontend.account.orders') }}">{{ trans('menus.frontend.header.account.orders') }}</a></li>
                    <li><a href="{{ route('frontend.account.profile') }}">{{ trans('menus.frontend.header.account.profile') }}</a></li>
                    <li><a href="{{ route('frontend.account.password') }}">{{ trans('menus.frontend.header.account.password') }}</a></li>
                </ul>

                <div class="account-menu__divider"></div>
                <ul class="account-menu__links">
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ trans('buttons.auth.logout') }}
                        </a>
                    </li>
                </ul>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </div>
    </div>
</div>

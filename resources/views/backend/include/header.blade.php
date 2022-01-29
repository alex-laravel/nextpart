<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mr-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <span class="c-header-toggler-icon"></span>
    </button>

    <a class="c-header-brand d-sm-none" href="#">
        <img class="c-header-brand" src="{{ url('/assets/brand/coreui-base.svg') }}" width="97" height="46" alt="CoreUI Logo">
    </a>

    <button class="c-header-toggler c-class-toggler ml-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <span class="c-header-toggler-icon"></span>
    </button>

<ul class="c-header-nav ml-auto mr-4">
{{--  <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">--}}
{{--      <svg class="c-icon">--}}
{{--        <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>--}}
{{--      </svg></a></li>--}}
{{--  <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">--}}
{{--      <svg class="c-icon">--}}
{{--        <use xlink:href="{{ url('/icons/sprites/free.svg#cil-list-rich') }}"></use>--}}
{{--      </svg></a></li>--}}
{{--  <li class="c-header-nav-item d-md-down-none mx-2"><a class="c-header-nav-link">--}}
{{--      <svg class="c-icon">--}}
{{--        <use xlink:href="{{ url('/icons/sprites/free.svg#cil-envelope-open') }}"></use>--}}
{{--      </svg></a></li>--}}
    @if (config('locale.enabled'))
        <li class="c-header-nav-item dropdown">
            <div class="btn-group">
                <button class="btn dropdown-toggle shadow-none" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-language mr-2"></i>
                    {{ trans('menus.backend.header.language.title') }}
                </button>

                <div class="dropdown-menu" role="menu">
                    @foreach (array_keys(config('locale.languages')) as $locale)
                        @if (!App::isLocale($locale))
                            <a class="dropdown-item" href="/locale/{{ $locale }}">
                                {{ trans('menus.backend.header.language.labels.' . $locale) }}
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </li>
    @endif

  <li class="c-header-nav-item dropdown">
      <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <div class="c-avatar">
              <img class="c-avatar-img" src="{{ url('/assets/img/avatars/avatar-default.png') }}" alt="">
          </div>
      </a>

    <div class="dropdown-menu dropdown-menu-right pt-0">
      <div class="dropdown-header bg-light py-2">
          <strong>Account</strong></div>
        <a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-bell') }}"></use>
        </svg> Updates<span class="badge badge-info ml-auto">42</span></a><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-envelope-open') }}"></use>
        </svg> Messages<span class="badge badge-success ml-auto">42</span></a><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-task') }}"></use>
        </svg> Tasks<span class="badge badge-danger ml-auto">42</span></a><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-comment-square') }}"></use>
        </svg> Comments<span class="badge badge-warning ml-auto">42</span></a>
      <div class="dropdown-header bg-light py-2"><strong>Settings</strong></div><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-user') }}"></use>
        </svg> Profile</a><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-settings') }}"></use>
        </svg> Settings</a><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-credit-card') }}"></use>
        </svg> Payments<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item" href="#">
        <svg class="c-icon mr-2">
          <use xlink:href="{{ url('/icons/sprites/free.svg#cil-file') }}"></use>
        </svg> Projects<span class="badge badge-primary ml-auto">42</span></a>
      <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="#">
            <svg class="c-icon mr-2">
              <use xlink:href="{{ url('/icons/sprites/free.svg#cil-lock-locked') }}"></use>
            </svg>
            Lock Account
        </a>

        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt mr-2"></i>
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
  </li>
</ul>

    <div class="c-subheader px-3">
{{--      <ol class="breadcrumb border-0 m-0">--}}
{{--        <li class="breadcrumb-item"><a href="/">Home</a></li>--}}
{{--        <li class="breadcrumb-item"><a href="/">Admin</a></li>--}}
{{--        <li class="breadcrumb-item"><a href="/">Dashboard</a></li>--}}
{{--      </ol>--}}
    </div>
</header>

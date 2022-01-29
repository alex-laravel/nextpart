<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand">{{ config('app.name') }}</div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                {{ trans('menus.backend.dashboard.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-title">
            {{ trans('menus.backend.tecdoc.title') }}
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.languages.index') }}">
                <i class="fas fa-globe-americas"></i>
                {{ trans('menus.backend.tecdoc.languages.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.countries.index') }}">
                <i class="far fa-flag"></i>
                {{ trans('menus.backend.tecdoc.countries.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.country-groups.index') }}">
                <i class="fas fa-flag-usa"></i>
                {{ trans('menus.backend.tecdoc.country-groups.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.brands.index') }}">
                <i class="far fa-building"></i>
                {{ trans('menus.backend.tecdoc.articles.brands.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fas fa-car"></i>
                {{ trans('menus.backend.tecdoc.cars.title') }}
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.manufacturers.index') }}"> {{ trans('menus.backend.tecdoc.cars.manufacturers.title') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.models.index') }}"> {{ trans('menus.backend.tecdoc.cars.models.title') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.vehicles.index') }}"> {{ trans('menus.backend.tecdoc.cars.vehicles.title') }}</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fas fa-tools"></i>
                {{ trans('menus.backend.tecdoc.articles.title') }}
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.short-cuts.index') }}"> {{ trans('menus.backend.tecdoc.short-cuts.title') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.assembly-groups.index') }}"> {{ trans('menus.backend.tecdoc.assembly-groups.title') }}</a></li>
{{--                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.generic-articles.index') }}"> {{ trans('menus.backend.tecdoc.generic-articles.title') }}</a></li>--}}
{{--                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.direct-articles.index') }}"> {{ trans('menus.backend.tecdoc.direct-articles.title') }}</a></li>--}}
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.direct-article-details.index') }}"> {{ trans('menus.backend.tecdoc.direct-article-details.title') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.direct-article-analogs.index') }}"> {{ trans('menus.backend.tecdoc.direct-article-analogs.title') }}</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.version.index') }}">
                <i class="fas fa-code-branch"></i>
                {{ trans('menus.backend.tecdoc.version.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-divider"></li>

        <li class="c-sidebar-nav-title">
            {{ trans('menus.backend.shop.title') }}
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.distributors.index') }}">
                <i class="fas fa-warehouse"></i>
                {{ trans('menus.backend.shop.distributors.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.distributor-storages.index') }}">
                <i class="fas fa-pallet"></i>
                {{ trans('menus.backend.shop.distributor-storages.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.distributor-products.index') }}">
                <i class="fas fa-barcode"></i>
                {{ trans('menus.backend.shop.distributor-products.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.orders.index') }}">
                <i class="fa fa-shopping-cart"></i>
                {{ trans('menus.backend.shop.orders.title') }}
            </a>
        </li>

        <li class="c-sidebar-nav-title">
            {{ trans('menus.backend.delivery.title') }}
        </li>

        <li class="c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                <i class="fas fa-shipping-fast"></i>
                {{ trans('menus.backend.delivery.nova-poshta.title') }}
            </a>

            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.delivery.nova-poshta.regions.index') }}"> {{ trans('menus.backend.delivery.nova-poshta.regions.title') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.delivery.nova-poshta.cities.index') }}"> {{ trans('menus.backend.delivery.nova-poshta.cities.title') }}</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('backend.delivery.nova-poshta.warehouses.index') }}"> {{ trans('menus.backend.delivery.nova-poshta.warehouses.title') }}</a></li>
            </ul>
        </li>

        <li class="c-sidebar-nav-title">
            {{ trans('menus.backend.settings.title') }}
        </li>

        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('backend.price-schemes.index') }}">
                <i class="far fa-money-bill-alt"></i>
                {{ trans('menus.backend.settings.price_schemes.title') }}
            </a>
        </li>

{{--        <li class="c-sidebar-nav-title">Labels</li>--}}
{{--        <li class="c-sidebar-nav-item c-d-compact-none c-d-minimized-none">--}}
{{--            <a class="c-sidebar-nav-label" href="#">--}}
{{--                <svg class="c-sidebar-nav-icon text-danger">--}}
{{--                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bookmark"></use>--}}
{{--                </svg>--}}
{{--                Label danger--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="c-sidebar-nav-item c-d-compact-none c-d-minimized-none">--}}
{{--            <a class="c-sidebar-nav-label" href="#">--}}
{{--                <svg class="c-sidebar-nav-icon text-info">--}}
{{--                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bookmark"></use>--}}
{{--                </svg>--}}
{{--                Label info--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="c-sidebar-nav-item c-d-compact-none c-d-minimized-none">--}}
{{--            <a class="c-sidebar-nav-label" href="#">--}}
{{--                <svg class="c-sidebar-nav-icon text-warning">--}}
{{--                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bookmark"></use>--}}
{{--                </svg>--}}
{{--                Label warning--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="c-sidebar-nav-divider"></li>--}}

{{--        <li class="c-sidebar-nav-title">System Utilization</li>--}}
{{--        <li class="c-sidebar-nav-item px-3 c-d-compact-none c-d-minimized-none">--}}
{{--            <div class="text-uppercase mb-1">--}}
{{--                <small><b>CPU Usage</b></small>--}}
{{--            </div>--}}

{{--            <div class="progress progress-xs">--}}
{{--                <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--            </div>--}}
{{--            <small class="text-muted">348 Processes. 1/4 Cores.</small>--}}
{{--        </li>--}}
{{--        <li class="c-sidebar-nav-item px-3 c-d-compact-none c-d-minimized-none">--}}
{{--            <div class="text-uppercase mb-1">--}}
{{--                <small><b>Memory Usage</b></small>--}}
{{--            </div>--}}

{{--            <div class="progress progress-xs">--}}
{{--                <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--            </div>--}}
{{--            <small class="text-muted">11444GB/16384MB</small>--}}
{{--        </li>--}}

{{--        <li class="c-sidebar-nav-item px-3 mb-3 c-d-compact-none c-d-minimized-none">--}}
{{--            <div class="text-uppercase mb-1">--}}
{{--                <small><b>SSD 1 Usage</b></small>--}}
{{--            </div>--}}

{{--            <div class="progress progress-xs">--}}
{{--                <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>--}}
{{--            </div>--}}
{{--            <small class="text-muted">243GB/256GB</small>--}}
{{--        </li>--}}

{{--        <div class="ps__rail-x" style="left: 0px; bottom: -502px;">--}}
{{--            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>--}}
{{--        </div>--}}

{{--        <div class="ps__rail-y" style="top: 502px; height: 800px; right: 0px;">--}}
{{--            <div class="ps__thumb-y" tabindex="0" style="top: 309px; height: 491px;"></div>--}}
{{--        </div>--}}
    </ul>

    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>

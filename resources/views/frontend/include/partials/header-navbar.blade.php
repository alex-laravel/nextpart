<div class="header__navbar">
    @if (count($sharedAssemblyGroups))
        <div class="header__navbar-departments">
            <div class="departments">
                <button class="departments__button" type="button">
                    <span class="departments__button-icon"><svg width="16px" height="12px">
                            <path d="M0,7L0,5L16,5L16,7L0,7ZM0,0L16,0L16,2L0,2L0,0ZM12,12L0,12L0,10L12,10L12,12Z" />
                        </svg>
                    </span>

                    <span class="departments__button-title">
                        {{ trans('menus.frontend.header.catalog') }}
                    </span>

                    <span class="departments__button-arrow"><svg width="9px" height="6px">
                            <path d="M0.2,0.4c0.4-0.4,1-0.5,1.4-0.1l2.9,3l2.9-3c0.4-0.4,1.1-0.4,1.4,0.1c0.3,0.4,0.3,0.9-0.1,1.3L4.5,6L0.3,1.6C-0.1,1.3-0.1,0.7,0.2,0.4z" />
                        </svg>
                    </span>
                </button>
                <div class="departments__menu">
                    <div class="departments__arrow"></div>
                    <div class="departments__body">
                        <ul class="departments__list">
                            <li class="departments__list-padding" role="presentation"></li>

                            @foreach ($sharedAssemblyGroups as $assemblyGroup)
                                <li class="departments__item {{ count($assemblyGroup['assemblyGroups']) ? 'departments__item--submenu--megamenu departments__item--has-submenu' : '' }}">
                                    <a href="{{ route('frontend.parts.category', $assemblyGroup['shortCutId']) }}" class="departments__item-link">
                                        {{ $assemblyGroup['shortCutName'] }}

                                        @if(count($assemblyGroup['assemblyGroups']))
                                            <span class="departments__item-arrow">
                                                <svg width="7" height="11">
                                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9	C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                                </svg>
                                            </span>
                                        @endif
                                    </a>

                                    @if(count($assemblyGroup['assemblyGroups']))
                                        <div class="departments__item-menu">
                                            <div class="megamenu departments__megamenu departments__megamenu--size--xl">
                                                <div class="megamenu__image">
                                                    <img src="images/departments/departments-2.jpg" alt="">
                                                </div>
                                                <div class="row">
                                                    @foreach ($assemblyGroup['assemblyGroups'] as $assemblyGroupFirstChild)
                                                        <div class="col-1of5 mb-4">
                                                            <ul class="megamenu__links megamenu-links megamenu-links--root">
                                                                <li class="megamenu-links__item {{ array_key_exists('children', $assemblyGroupFirstChild) && count($assemblyGroupFirstChild['children']) ? 'megamenu-links__item--has-submenu' : '' }}">
                                                                    <a href="{{ route('frontend.parts.assembly', $assemblyGroupFirstChild['assemblyGroupNodeId']) }}" class="megamenu-links__item-link">
                                                                        {{ $assemblyGroupFirstChild['assemblyGroupName'] }}
                                                                    </a>

                                                                    @if(array_key_exists('children', $assemblyGroupFirstChild) && count($assemblyGroupFirstChild['children']))
                                                                        <ul class="megamenu-links">
                                                                            @foreach ($assemblyGroupFirstChild['children'] as $assemblyGroupSecondChild)
                                                                                <li class="megamenu-links__item">
                                                                                    <a href="{{ route('frontend.parts.assembly', $assemblyGroupSecondChild['assemblyGroupNodeId']) }}" class="megamenu-links__item-link">
                                                                                        {{ $assemblyGroupSecondChild['assemblyGroupName'] }}
                                                                                    </a>

                                                                                    @if(array_key_exists('children', $assemblyGroupSecondChild) && count($assemblyGroupSecondChild['children']))
                                                                                        <ul class="megamenu-links border-0 pl-3">
                                                                                            @foreach ($assemblyGroupSecondChild['children'] as $assemblyGroupThirdChild)
                                                                                                <li class="megamenu-links__item">
                                                                                                    <a href="{{ route('frontend.parts.assembly', $assemblyGroupThirdChild['assemblyGroupNodeId']) }}" class="megamenu-links__item-link">
                                                                                                        <i class="fas fa-caret-right d-inline-block mr-2"></i>
                                                                                                        {{ $assemblyGroupThirdChild['assemblyGroupName'] }}
                                                                                                    </a>

                                                                                                    @if(array_key_exists('children', $assemblyGroupThirdChild) && count($assemblyGroupThirdChild['children']))
                                                                                                        <ul class="megamenu-links border-0 pl-5">
                                                                                                            @foreach ($assemblyGroupThirdChild['children'] as $assemblyGroupFourthChild)
                                                                                                                <li class="megamenu-links__item">
                                                                                                                    <a href="{{ route('frontend.parts.assembly', $assemblyGroupFourthChild['assemblyGroupNodeId']) }}" class="megamenu-links__item-link">
                                                                                                                        <i class="fas fa-caret-right d-inline-block mr-2"></i>
                                                                                                                        {{ $assemblyGroupFourthChild['assemblyGroupName'] }}
                                                                                                                    </a>

                                                                                                                    @if(array_key_exists('children', $assemblyGroupFourthChild) && count($assemblyGroupFourthChild['children']))
                                                                                                                        <ul class="megamenu-links border-0 pl-5">
                                                                                                                            @foreach ($assemblyGroupFourthChild['children'] as $assemblyGroupFifthChild)
                                                                                                                                <li class="megamenu-links__item">
                                                                                                                                    <a href="{{ route('frontend.parts.assembly', $assemblyGroupFifthChild['assemblyGroupNodeId']) }}" class="megamenu-links__item-link">
                                                                                                                                        <i class="fas fa-caret-right d-inline-block mr-2"></i>
                                                                                                                                        {{ $assemblyGroupFifthChild['assemblyGroupName'] }}
                                                                                                                                    </a>
                                                                                                                                </li>
                                                                                                                            @endforeach
                                                                                                                        </ul>
                                                                                                                    @endif
                                                                                                                </li>
                                                                                                            @endforeach
                                                                                                        </ul>
                                                                                                    @endif
                                                                                                </li>
                                                                                            @endforeach
                                                                                        </ul>
                                                                                    @endif
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    @endif
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </li>
{{--                                @include('frontend.auto-parts.partials.assembly-group-child', $assemblyGroup)--}}
                            @endforeach

                            <li class="departments__list-padding" role="presentation"></li>
                        </ul>

                        <div class="departments__menu-container"></div>
                    </div>
                </div>
            </div>
        </div>
    @endif

{{--    <div class="header__navbar-menu">--}}
{{--        <div class="main-menu">--}}
{{--            <ul class="main-menu__list">--}}
{{--                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">--}}
{{--                    <a href="index.html" class="main-menu__link">--}}
{{--                        Home--}}
{{--                        <svg width="7px" height="5px">--}}
{{--                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                    <div class="main-menu__submenu">--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="index.html" class="menu__link">--}}
{{--                                    Home One--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="index2.html" class="menu__link">--}}
{{--                                    Home Two--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="header-spaceship-variant-one.html" class="menu__link">--}}
{{--                                    Header Spaceship--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-spaceship-variant-one.html" class="menu__link">--}}
{{--                                                Variant One--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-spaceship-variant-two.html" class="menu__link">--}}
{{--                                                Variant Two--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-spaceship-variant-three.html" class="menu__link">--}}
{{--                                                Variant Three--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="header-classic-variant-one.html" class="menu__link">--}}
{{--                                    Header Classic--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-classic-variant-one.html" class="menu__link">--}}
{{--                                                Variant One--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-classic-variant-two.html" class="menu__link">--}}
{{--                                                Variant Two--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-classic-variant-three.html" class="menu__link">--}}
{{--                                                Variant Three--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-classic-variant-four.html" class="menu__link">--}}
{{--                                                Variant Four--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="header-classic-variant-five.html" class="menu__link">--}}
{{--                                                Variant Five--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="mobile-header-variant-one.html" class="menu__link">--}}
{{--                                    Mobile Header--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="mobile-header-variant-one.html" class="menu__link">--}}
{{--                                                Variant One--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="mobile-header-variant-two.html" class="menu__link">--}}
{{--                                                Variant Two--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">--}}
{{--                    <a href="shop-grid-4-columns-sidebar.html" class="main-menu__link">--}}
{{--                        Shop--}}
{{--                        <svg width="7px" height="5px">--}}
{{--                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                    <div class="main-menu__submenu">--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="category-4-columns-sidebar.html" class="menu__link">--}}
{{--                                    Category--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-3-columns-sidebar.html" class="menu__link">--}}
{{--                                                3 Columns Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-4-columns-sidebar.html" class="menu__link">--}}
{{--                                                4 Columns Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-5-columns-sidebar.html" class="menu__link">--}}
{{--                                                5 Columns Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-4-columns-full.html" class="menu__link">--}}
{{--                                                4 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-5-columns-full.html" class="menu__link">--}}
{{--                                                5 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-6-columns-full.html" class="menu__link">--}}
{{--                                                6 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-7-columns-full.html" class="menu__link">--}}
{{--                                                7 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="category-right-sidebar.html" class="menu__link">--}}
{{--                                                Right Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="shop-grid-4-columns-sidebar.html" class="menu__link">--}}
{{--                                    Shop Grid--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="shop-grid-6-columns-full.html" class="menu__link">--}}
{{--                                                6 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="shop-grid-5-columns-full.html" class="menu__link">--}}
{{--                                                5 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="shop-grid-4-columns-full.html" class="menu__link">--}}
{{--                                                4 Columns Full--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="shop-grid-4-columns-sidebar.html" class="menu__link">--}}
{{--                                                4 Columns Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="shop-grid-3-columns-sidebar.html" class="menu__link">--}}
{{--                                                3 Columns Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="shop-list.html" class="menu__link">--}}
{{--                                    Shop List--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="shop-table.html" class="menu__link">--}}
{{--                                    Shop Table--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="shop-right-sidebar.html" class="menu__link">--}}
{{--                                    Shop Right Sidebar--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="product-full.html" class="menu__link">--}}
{{--                                    Product--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="product-full.html" class="menu__link">--}}
{{--                                                Full Width--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="product-sidebar.html" class="menu__link">--}}
{{--                                                Left Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="cart.html" class="menu__link">--}}
{{--                                    Cart--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="checkout.html" class="menu__link">--}}
{{--                                    Checkout--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="order-success.html" class="menu__link">--}}
{{--                                    Order Success--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="wishlist.html" class="menu__link">--}}
{{--                                    Wishlist--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="compare.html" class="menu__link">--}}
{{--                                    Compare--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="track-order.html" class="menu__link">--}}
{{--                                    Track Order--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">--}}
{{--                    <a href="blog-classic-right-sidebar.html" class="main-menu__link">--}}
{{--                        Blog--}}
{{--                        <svg width="7px" height="5px">--}}
{{--                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                    <div class="main-menu__submenu">--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="blog-classic-right-sidebar.html" class="menu__link">--}}
{{--                                    Blog Classic--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="blog-classic-left-sidebar.html" class="menu__link">--}}
{{--                                                Left Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="blog-classic-right-sidebar.html" class="menu__link">--}}
{{--                                                Right Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="blog-list-right-sidebar.html" class="menu__link">--}}
{{--                                    Blog List--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="blog-list-left-sidebar.html" class="menu__link">--}}
{{--                                                Left Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="blog-list-right-sidebar.html" class="menu__link">--}}
{{--                                                Right Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="blog-grid-right-sidebar.html" class="menu__link">--}}
{{--                                    Blog Grid--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="blog-grid-left-sidebar.html" class="menu__link">--}}
{{--                                                Left Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="blog-grid-right-sidebar.html" class="menu__link">--}}
{{--                                                Right Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item menu__item--has-submenu">--}}
{{--                                <a href="post-full-width.html" class="menu__link">--}}
{{--                                    Post Page--}}
{{--                                    <span class="menu__arrow">--}}
{{--                                                        <svg width="6px" height="9px">--}}
{{--                                                            <path d="M0.3,7.4l3-2.9l-3-2.9c-0.4-0.3-0.4-0.9,0-1.3l0,0c0.4-0.3,0.9-0.4,1.3,0L6,4.5L1.6,8.7c-0.4,0.4-0.9,0.4-1.3,0l0,0C-0.1,8.4-0.1,7.8,0.3,7.4z" />--}}
{{--                                                        </svg>--}}
{{--                                                    </span>--}}
{{--                                </a>--}}
{{--                                <div class="menu__submenu">--}}
{{--                                    <ul class="menu">--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="post-full-width.html" class="menu__link">--}}
{{--                                                Full Width--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="post-left-sidebar.html" class="menu__link">--}}
{{--                                                Left Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                        <li class="menu__item">--}}
{{--                                            <a href="post-right-sidebar.html" class="menu__link">--}}
{{--                                                Right Sidebar--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="post-without-image.html" class="menu__link">--}}
{{--                                    Post Without Image--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li class="main-menu__item main-menu__item--submenu--menu main-menu__item--has-submenu">--}}
{{--                    <a href="account-login.html" class="main-menu__link">--}}
{{--                        Account--}}
{{--                        <svg width="7px" height="5px">--}}
{{--                            <path d="M0.280,0.282 C0.645,-0.084 1.238,-0.077 1.596,0.297 L3.504,2.310 L5.413,0.297 C5.770,-0.077 6.363,-0.084 6.728,0.282 C7.080,0.634 7.088,1.203 6.746,1.565 L3.504,5.007 L0.262,1.565 C-0.080,1.203 -0.072,0.634 0.280,0.282 Z" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                    <div class="main-menu__submenu">--}}
{{--                        <ul class="menu">--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-login.html" class="menu__link">--}}
{{--                                    Login & Register--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-dashboard.html" class="menu__link">--}}
{{--                                    Dashboard--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-garage.html" class="menu__link">--}}
{{--                                    Garage--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-profile.html" class="menu__link">--}}
{{--                                    Edit Profile--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-orders.html" class="menu__link">--}}
{{--                                    Order History--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-order-details.html" class="menu__link">--}}
{{--                                    Order Details--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-addresses.html" class="menu__link">--}}
{{--                                    Address Book--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-edit-address.html" class="menu__link">--}}
{{--                                    Edit Address--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="menu__item">--}}
{{--                                <a href="account-password.html" class="menu__link">--}}
{{--                                    Change Password--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>




<div class="header__search">
    <div class="search">
        <form action="{{ route('frontend.parts.search') }}" class="search__body" method="POST">
            @csrf
            <div class="search__shadow"></div>
            <input class="search__input" name="searchCode" type="text" placeholder="{{ trans('strings.frontend.general.search') }}" value="{{ old('searchCode') }}">
            <button class="search__button search__button--start" type="button">
                                <span class="search__button-icon"><svg width="20" height="20">
                                        <path d="M6.6,2c2,0,4.8,0,6.8,0c1,0,2.9,0.8,3.6,2.2C17.7,5.7,17.9,7,18.4,7C20,7,20,8,20,8v1h-1v7.5c0,0.8-0.7,1.5-1.5,1.5h-1
	c-0.8,0-1.5-0.7-1.5-1.5V16H5v0.5C5,17.3,4.3,18,3.5,18h-1C1.7,18,1,17.3,1,16.5V16V9H0V8c0,0,0.1-1,1.6-1C2.1,7,2.3,5.7,3,4.2
	C3.7,2.8,5.6,2,6.6,2z M13.3,4H6.7c-0.8,0-1.4,0-2,0.7c-0.5,0.6-0.8,1.5-1,2C3.6,7.1,3.5,7.9,3.7,8C4.5,8.4,6.1,9,10,9
	c4,0,5.4-0.6,6.3-1c0.2-0.1,0.2-0.8,0-1.2c-0.2-0.4-0.5-1.5-1-2C14.7,4,14.1,4,13.3,4z M4,10c-0.4-0.3-1.5-0.5-2,0
	c-0.4,0.4-0.4,1.6,0,2c0.5,0.5,4,0.4,4,0C6,11.2,4.5,10.3,4,10z M14,12c0,0.4,3.5,0.5,4,0c0.4-0.4,0.4-1.6,0-2c-0.5-0.5-1.3-0.3-2,0
	C15.5,10.2,14,11.3,14,12z" />
                                    </svg>

                                    @if(\App\Facades\Garage::getVehiclesTotal() > 0)
                                        <span class="indicator__counter">
                                            {{ \App\Facades\Garage::getVehiclesTotal() }}
                                        </span>
                                    @endif
                                </span>
                <span class="search__button-title">Select Vehicle</span>
            </button>
            <button class="search__button search__button--end" type="submit">
                                <span class="search__button-icon"><svg width="20" height="20">
                                        <path d="M19.2,17.8c0,0-0.2,0.5-0.5,0.8c-0.4,0.4-0.9,0.6-0.9,0.6s-0.9,0.7-2.8-1.6c-1.1-1.4-2.2-2.8-3.1-3.9C10.9,14.5,9.5,15,8,15
	c-3.9,0-7-3.1-7-7s3.1-7,7-7s7,3.1,7,7c0,1.5-0.5,2.9-1.3,4c1.1,0.8,2.5,2,4,3.1C20,16.8,19.2,17.8,19.2,17.8z M8,3C5.2,3,3,5.2,3,8
	c0,2.8,2.2,5,5,5c2.8,0,5-2.2,5-5C13,5.2,10.8,3,8,3z" />
                                    </svg>
                                </span>
            </button>
            <div class="search__box"></div>
            <div class="search__decor">
                <div class="search__decor-start"></div>
                <div class="search__decor-end"></div>
            </div>
{{--            <div class="search__dropdown search__dropdown--suggestions suggestions">--}}
{{--                <div class="suggestions__group">--}}
{{--                    <div class="suggestions__group-title">Products</div>--}}
{{--                    <div class="suggestions__group-content">--}}
{{--                        <a class="suggestions__item suggestions__product" href="">--}}
{{--                            <div class="suggestions__product-image image image--type--product">--}}
{{--                                <div class="image__body">--}}
{{--                                    <img class="image__tag" src="images/products/product-2-40x40.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="suggestions__product-info">--}}
{{--                                <div class="suggestions__product-name">Brandix Brake Kit BDX-750Z370-S</div>--}}
{{--                                <div class="suggestions__product-rating">--}}
{{--                                    <div class="suggestions__product-rating-stars">--}}
{{--                                        <div class="rating">--}}
{{--                                            <div class="rating__body">--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="suggestions__product-rating-label">5 on 22 reviews</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="suggestions__product-price">$224.00</div>--}}
{{--                        </a>--}}
{{--                        <a class="suggestions__item suggestions__product" href="">--}}
{{--                            <div class="suggestions__product-image image image--type--product">--}}
{{--                                <div class="image__body">--}}
{{--                                    <img class="image__tag" src="images/products/product-3-40x40.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="suggestions__product-info">--}}
{{--                                <div class="suggestions__product-name">Left Headlight Of Brandix Z54</div>--}}
{{--                                <div class="suggestions__product-rating">--}}
{{--                                    <div class="suggestions__product-rating-stars">--}}
{{--                                        <div class="rating">--}}
{{--                                            <div class="rating__body">--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star"></div>--}}
{{--                                                <div class="rating__star"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="suggestions__product-rating-label">3 on 14 reviews</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="suggestions__product-price">$349.00</div>--}}
{{--                        </a>--}}
{{--                        <a class="suggestions__item suggestions__product" href="">--}}
{{--                            <div class="suggestions__product-image image image--type--product">--}}
{{--                                <div class="image__body">--}}
{{--                                    <img class="image__tag" src="images/products/product-4-40x40.jpg" alt="">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="suggestions__product-info">--}}
{{--                                <div class="suggestions__product-name">Glossy Gray 19" Aluminium Wheel AR-19</div>--}}
{{--                                <div class="suggestions__product-rating">--}}
{{--                                    <div class="suggestions__product-rating-stars">--}}
{{--                                        <div class="rating">--}}
{{--                                            <div class="rating__body">--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star rating__star--active"></div>--}}
{{--                                                <div class="rating__star"></div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="suggestions__product-rating-label">4 on 26 reviews</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="suggestions__product-price">$589.00</div>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="suggestions__group">--}}
{{--                    <div class="suggestions__group-title">Categories</div>--}}
{{--                    <div class="suggestions__group-content">--}}
{{--                        <a class="suggestions__item suggestions__category" href="">Headlights & Lighting</a>--}}
{{--                        <a class="suggestions__item suggestions__category" href="">Fuel System & Filters</a>--}}
{{--                        <a class="suggestions__item suggestions__category" href="">Body Parts & Mirrors</a>--}}
{{--                        <a class="suggestions__item suggestions__category" href="">Interior Accessories</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            @include('frontend.include.partials.header-garage')
        </form>
    </div>
</div>

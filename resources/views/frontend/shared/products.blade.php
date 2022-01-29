@foreach ($parts as $part)
<div class="products-list__item">
    <div class="product-card">
{{--        <div class="product-card__actions-list">--}}
{{--            <button class="product-card__action product-card__action--quickview" type="button" aria-label="Quick view">--}}
{{--                <svg width="16" height="16">--}}
{{--                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--         M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--            <button class="product-card__action product-card__action--wishlist" type="button" aria-label="Add to wish list">--}}
{{--                <svg width="16" height="16">--}}
{{--                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7--}}
{{--        l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--            <button class="product-card__action product-card__action--compare" type="button" aria-label="Add to compare">--}}
{{--                <svg width="16" height="16">--}}
{{--                    <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />--}}
{{--                    <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />--}}
{{--                    <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </div>--}}

        <div class="product-card__image">
            <div class="image image--type--product">
                <a href="{{ route('frontend.parts.details', $part->articleId) }}" class="image__body">
                    @empty($part->assetDocumentName)
                        <img class="image__tag" src="{{ asset('images/products/product-1-245x245.jpg') }}" alt="">
                    @else
                        <img class="image__tag" src="{{ asset('assets/articles/' . $part->assetDocumentName) }}" alt="">
                    @endempty
                </a>
            </div>
{{--            <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">--}}
{{--                <div class="status-badge__body">--}}
{{--                    <div class="status-badge__icon"><svg width="13" height="13">--}}
{{--                            <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z" />--}}
{{--                        </svg>--}}
{{--                    </div>--}}
{{--                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>--}}
{{--                    <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <div class="product-card__info">
            <div class="product-card__meta">
                <span class="product-card__meta-title">{{ trans('labels.frontend.product.original_number') }}:</span>
                <strong>{{ $part->articleNo }}</strong>
            </div>

            <div class="product-card__name">
                <div>
{{--                    <div class="product-card__badges">--}}
{{--                        <div class="tag-badge tag-badge--sale">sale</div>--}}
{{--                        <div class="tag-badge tag-badge--new">new</div>--}}
{{--                        <div class="tag-badge tag-badge--hot">hot</div>--}}
{{--                    </div>--}}

                    <a href="{{ route('frontend.parts.details', $part->articleId) }}">
                        {{ $part->articleName }}
                    </a>
                </div>
            </div>

{{--            <div class="product-card__rating">--}}
{{--                <div class="rating product-card__rating-stars">--}}
{{--                    <div class="rating__body">--}}
{{--                        <div class="rating__star rating__star--active"></div>--}}
{{--                        <div class="rating__star rating__star--active"></div>--}}
{{--                        <div class="rating__star rating__star--active"></div>--}}
{{--                        <div class="rating__star rating__star--active"></div>--}}
{{--                        <div class="rating__star"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="product-card__rating-label">4 on 3 reviews</div>--}}
{{--            </div>--}}
{{--            <div class="product-card__features">--}}
{{--                @if(is_array($part->articleAttributes) && array_key_exists('array', $part->articleAttributes))--}}
{{--                    <ul>--}}
{{--                        @foreach ($part->articleAttributes['array'] as $articleAttribute)--}}
{{--                            <li>{{ $articleAttribute['attrName'] }}: {{ $articleAttribute['attrValue'] }}</li>--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}

{{--                @if(is_string($part->articleAttributes) && !empty($part->articleAttributes) && $part->articleAttributes != '""')--}}
{{--                    <ul>--}}
{{--                        @foreach (json_decode($part->articleAttributes, true) as $articleAttributes)--}}
{{--                            @foreach ($articleAttributes as $articleAttribute)--}}
{{--                                <li>{{ $articleAttribute['attrName'] }}: {{ $articleAttribute['attrValue'] }}</li>--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>
        <div class="product-card__footer">
            <div class="product-card__prices">
                <div class="product-card__price product-card__price--current">
                    @if($part->price > 0)
                        {{ productPriceFormatted($part->price) }} {{ trans('strings.general.hrn') }}
                    @else
                        <div class="status-badge status-badge--style--failure product__stock status-badge--has-text">
                            <div class="status-badge__body">
                                <div class="status-badge__text text-nowrap">{{ trans('labels.frontend.product.status.out_of_stock') }}</div>
                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip" title="{{ trans('labels.frontend.product.status.out_of_stock') }}"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            @if($part->price > 0)
            <a class="product-card__addtocart-icon" href="{{ route('frontend.cart.add', $part->productId) }}" role="button" aria-label="{{ trans('buttons.frontend.shop.add_to_cart') }}">
                <svg width="20" height="20">
                    <circle cx="7" cy="17" r="2" />
                    <circle cx="15" cy="17" r="2" />
                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6 V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4 C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z" />
                </svg>
            </a>
            @endif

{{--            <button class="product-card__addtocart-full" type="button">--}}
{{--                {{ trans('buttons.frontend.shop.add_to_cart') }}--}}
{{--            </button>--}}

            @if($part->price > 0)
            <a class="product-card__addtocart-full text-center" style="line-height: 36px" href="{{ route('frontend.cart.add', $part->productId) }}" role="button">
                {{ trans('buttons.frontend.shop.add_to_cart') }}
            </a>
            @endif

{{--            <button class="product-card__wishlist" type="button">--}}
{{--                <svg width="16" height="16">--}}
{{--                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7--}}
{{--        l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z" />--}}
{{--                </svg>--}}
{{--                <span>Add to wishlist</span>--}}
{{--            </button>--}}
{{--            <button class="product-card__compare" type="button">--}}
{{--                <svg width="16" height="16">--}}
{{--                    <path d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z" />--}}
{{--                    <path d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z" />--}}
{{--                    <path d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z" />--}}
{{--                </svg>--}}
{{--                <span>Add to compare</span>--}}
{{--            </button>--}}
        </div>
    </div>
</div>
@endforeach

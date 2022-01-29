@php $total = Cart::totalPrice() @endphp

<div class="indicator indicator--trigger--click">
    <a href="{{ route('frontend.cart.index') }}" class="indicator__button">
        <span class="indicator__icon">
            <svg width="32" height="32">
                <circle cx="10.5" cy="27.5" r="2.5" />
                <circle cx="23.5" cy="27.5" r="2.5" />
                <path d="M26.4,21H11.2C10,21,9,20.2,8.8,19.1L5.4,4.8C5.3,4.3,4.9,4,4.4,4H1C0.4,4,0,3.6,0,3s0.4-1,1-1h3.4C5.8,2,7,3,7.3,4.3 l3.4,14.3c0.1,0.2,0.3,0.4,0.5,0.4h15.2c0.2,0,0.4-0.1,0.5-0.4l3.1-10c0.1-0.2,0-0.4-0.1-0.4C29.8,8.1,29.7,8,29.5,8H14 c-0.6,0-1-0.4-1-1s0.4-1,1-1h15.5c0.8,0,1.5,0.4,2,1c0.5,0.6,0.6,1.5,0.4,2.2l-3.1,10C28.5,20.3,27.5,21,26.4,21z" />
            </svg>
            <span class="indicator__counter">{{ count(Cart::getCart()) }}</span>
        </span>
        <span class="indicator__title">{{ trans('labels.frontend.cart.title') }}</span>
        <span class="indicator__value">{{ productPriceFormatted($total) }} {{ trans('strings.general.hrn') }}</span>
    </a>

    <div class="indicator__content">
        <div class="dropcart">
            <ul class="dropcart__list">
                @foreach(Cart::getCart() as $productId => $productDetails)
                    <li class="dropcart__item">
                        <div class="dropcart__item-image image image--type--product">
                            <a class="image__body" href="{{ route('frontend.parts.details', $productDetails['articleId']) }}">
                                <img class="image__tag" src="{{ $productDetails['thumbnail'] }}" alt="{{ $productDetails['title'] }}">
                            </a>
                        </div>

                        <div class="dropcart__item-info">
                            <div class="dropcart__item-name">
                                <a href="{{ route('frontend.parts.details', $productDetails['articleId']) }}">{{ $productDetails['title'] }}</a>
                            </div>
{{--                            <ul class="dropcart__item-features">--}}
{{--                                <li>Color: Yellow</li>--}}
{{--                                <li>Material: Aluminium</li>--}}
{{--                            </ul>--}}
                            <div class="dropcart__item-meta">
                                <div class="dropcart__item-quantity">{{ $productDetails['quantity'] }}</div>
                                <div class="dropcart__item-price">
                                    {{ productPriceFormatted($productDetails['price']) }}
                                    {{ trans('strings.general.hrn') }}
                                </div>
                            </div>
                        </div>

                        <a class="dropcart__item-remove" href="{{ route('frontend.cart.remove', $productId) }}" role="button">
                            <svg width="10" height="10">
                                <path d="M8.8,8.8L8.8,8.8c-0.4,0.4-1,0.4-1.4,0L5,6.4L2.6,8.8c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L3.6,5L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L5,3.6l2.4-2.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L6.4,5l2.4,2.4 C9.2,7.8,9.2,8.4,8.8,8.8z" />
                            </svg>
                        </a>
                    </li>
                    <li class="dropcart__divider" role="presentation"></li>
                @endforeach
            </ul>

            <div class="dropcart__totals">
                <table>
                    <tr>
                        <th>{{ trans('labels.frontend.cart.total') }}</th>
                        <td>{{ productPriceFormatted($total) }} {{ trans('strings.general.hrn') }}</td>
                    </tr>
                </table>
            </div>

            <div class="dropcart__actions">
                <a href="{{ route('frontend.cart.index') }}" class="btn btn-secondary">{{ trans('labels.frontend.cart.button.view_cart') }}</a>
                <a href="{{ route('frontend.checkout.index') }}" class="btn btn-primary">{{ trans('labels.frontend.cart.button.checkout') }}</a>
            </div>
        </div>
    </div>
</div>

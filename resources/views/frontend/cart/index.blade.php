@extends('frontend.layout.main')

@section('meta_title', trans('meta.shop.cart.title'))
@section('meta_description', trans('meta.shop.cart.description'))
@section('meta_keywords', trans('meta.shop.cart.keywords'))

@section('content')
    <div class="site__body">
        <div class="block-header block-header--has-breadcrumb block-header--has-title">
            <div class="container">
                <div class="block-header__body">
{{--                    <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">--}}
{{--                        <ol class="breadcrumb__list">--}}
{{--                            <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>--}}
{{--                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first">--}}
{{--                                <a href="index.html" class="breadcrumb__item-link">Home</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb__item breadcrumb__item--parent">--}}
{{--                                <a href="" class="breadcrumb__item-link">Breadcrumb</a>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb__item breadcrumb__item--current breadcrumb__item--last" aria-current="page">--}}
{{--                                <span class="breadcrumb__item-link">Current Page</span>--}}
{{--                            </li>--}}
{{--                            <li class="breadcrumb__title-safe-area" role="presentation"></li>--}}
{{--                        </ol>--}}
{{--                    </nav>--}}
                    <h1 class="block-header__title">{{ trans('meta.shop.cart.title') }}</h1>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                @if(!Cart::isEmpty())
                    <div class="cart">
                        <div class="cart__table cart-table">
                            <table class="cart-table__table">
{{--                                <thead class="cart-table__head">--}}
{{--                                <tr class="cart-table__row">--}}
{{--                                    <th class="cart-table__column cart-table__column--image">Image</th>--}}
{{--                                    <th class="cart-table__column cart-table__column--product">Product</th>--}}
{{--                                    <th class="cart-table__column cart-table__column--price">Price</th>--}}
{{--                                    <th class="cart-table__column cart-table__column--quantity">Quantity</th>--}}
{{--                                    <th class="cart-table__column cart-table__column--total">Total</th>--}}
{{--                                    <th class="cart-table__column cart-table__column--remove"></th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
                                <tbody class="cart-table__body">
                                    @foreach(Cart::getCart() as $productId => $productDetails)
                                    <tr class="cart-table__row">
                                        <td class="cart-table__column cart-table__column--image">
                                            <div class="image image--type--product">
                                                <a href="{{ route('frontend.parts.details', $productDetails['articleId']) }}" class="image__body">
                                                    <img class="image__tag" src="{{ $productDetails['thumbnail'] }}" alt="{{ $productDetails['title'] }}">
                                                </a>
                                            </div>
                                        </td>

                                        <td class="cart-table__column cart-table__column--product">
                                            <a href="{{ route('frontend.parts.details', $productDetails['articleId']) }}" class="cart-table__product-name">
                                                {{ $productDetails['title'] }}
                                            </a>
                                        </td>

                                        <td class="cart-table__column cart-table__column--price" data-title="Price">
                                            {{ productPriceFormatted($productDetails['price']) }}
                                            {{ trans('strings.general.hrn') }}
                                        </td>

                                        <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                            <div class="cart-table__quantity input-number">
                                                <input class="form-control input-number__input" type="number" min="1" value="{{ $productDetails['quantity'] }}">
                                                <div class="input-number__add"></div>
                                                <div class="input-number__sub"></div>
                                            </div>
                                        </td>

                                        <td class="cart-table__column cart-table__column--total" data-title="Total">
                                            {{ productPriceFormatted($productDetails['price'] * $productDetails['quantity']) }}
                                            {{ trans('strings.general.hrn') }}
                                        </td>

                                        <td class="cart-table__column cart-table__column--remove">
                                            <a class="cart-table__remove btn btn-sm btn-icon btn-muted" href="{{ route('frontend.cart.remove', $productId) }}" role="button">
                                                <svg width="12" height="12">
                                                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
{{--                                <tfoot class="cart-table__foot">--}}
{{--                                <tr>--}}
{{--                                    <td colspan="6">--}}
{{--                                        <div class="cart-table__actions">--}}
{{--                                            <form class="cart-table__coupon-form form-row">--}}
{{--                                                <div class="form-group mb-0 col flex-grow-1">--}}
{{--                                                    <input type="text" class="form-control form-control-sm" placeholder="Coupon Code">--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group mb-0 col-auto">--}}
{{--                                                    <button type="button" class="btn btn-sm btn-primary">Apply Coupon</button>--}}
{{--                                                </div>--}}
{{--                                            </form>--}}
{{--                                            <div class="cart-table__update-button">--}}
{{--                                                <a class="btn btn-sm btn-primary" href="">Update Cart</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
                            </table>
                        </div>
                        <div class="cart__totals">
                            <div class="card">
                                <div class="card-body card-body--padding--2">
{{--                                    <h3 class="card-title">Cart Totals</h3>--}}
                                    <table class="cart__totals-table">
{{--                                        <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Subtotal</th>--}}
{{--                                            <td>$5,877.00</td>--}}
{{--                                        </tr>--}}
{{--                                        </thead>--}}
{{--                                        <tbody>--}}
{{--                                        <tr>--}}
{{--                                            <th>Shipping</th>--}}
{{--                                            <td>--}}
{{--                                                $25.00--}}
{{--                                                <div>--}}
{{--                                                    <a href="">Calculate shipping</a>--}}
{{--                                                </div>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                        <tr>--}}
{{--                                            <th>Tax</th>--}}
{{--                                            <td>$0.00</td>--}}
{{--                                        </tr>--}}
{{--                                        </tbody>--}}
                                        <tfoot>
                                        <tr>
                                            <th>{{ trans('labels.frontend.shop.cart.total') }}</th>
                                            <td>
                                                {{ productPriceFormatted(Cart::totalPrice()) }}
                                                {{ trans('strings.general.hrn') }}
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>

                                    <a class="btn btn-primary btn-xl btn-block" href="{{ route('frontend.checkout.index') }}">
                                        {{ trans('buttons.frontend.shop.proceed_to_checkout') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    <small class="d-block">{{ trans('labels.frontend.shop.cart.no_products') }}</small>
                @endif
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection

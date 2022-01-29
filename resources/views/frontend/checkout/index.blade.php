@extends('frontend.layout.main')

@section('meta_title', trans('meta.shop.checkout.title'))
@section('meta_description', trans('meta.shop.checkout.description'))
@section('meta_keywords', trans('meta.shop.checkout.keywords'))

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
                <h1 class="block-header__title">{{ trans('meta.shop.checkout.title') }}</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <div class="container container--max--xl">
            @guest
                <div class="row">
                    <div class="col-12 mb-3">
                        <div
                            class="alert alert-lg alert-primary">{{ trans('strings.frontend.shop.checkout.regular_customer') }}
                            <a href="{{ route('login') }}">
                                {{ trans('menus.frontend.footer.account.labels.login') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endguest


            {{ Form::open(['route' => 'frontend.orders.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'POST', 'novalidate' => true]) }}
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <div class="card mb-lg-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">{{ trans('labels.frontend.shop.checkout.billing_details') }}</h3>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customer_first_name">{{ trans('labels.frontend.shop.checkout.first_name') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           name="customer_first_name"
                                           id="customer_first_name"
                                           value="{{ !is_null(old('customer_first_name')) ? old('customer_first_name') : (auth()->check() ? auth()->user()->first_name : '') }}"
                                           placeholder="{{ trans('labels.frontend.shop.checkout.first_name') }}" maxlength="255">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="customer_last_name">{{ trans('labels.frontend.shop.checkout.last_name') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           name="customer_last_name"
                                           id="customer_last_name"
                                           value="{{ !is_null(old('customer_last_name')) ? old('customer_last_name') : (auth()->check() ? auth()->user()->last_name : '') }}"
                                           placeholder="{{ trans('labels.frontend.shop.checkout.last_name') }}" maxlength="255">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="customer_email">{{ trans('labels.frontend.shop.checkout.email') }}</label>
                                    <input type="email"
                                           class="form-control"
                                           name="customer_email"
                                           id="customer_email"
                                           value="{{ !is_null(old('customer_email')) ? old('customer_email') : (auth()->check() ? auth()->user()->email : '') }}"
                                           placeholder="{{ trans('labels.frontend.shop.checkout.email') }}" maxlength="255">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="customer_phone">{{ trans('labels.frontend.shop.checkout.phone') }}</label>
                                    <input type="text"
                                           class="form-control"
                                           name="customer_phone"
                                           id="customer_phone"
                                           value="{{ !is_null(old('customer_phone')) ? old('customer_phone') : (auth()->check() ? auth()->user()->phone : '') }}"
                                           placeholder="{{ trans('labels.frontend.shop.checkout.phone') }}" maxlength="13">
                                </div>
                            </div>

{{--                            @guest--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <span class="input-check form-check-input">--}}
{{--                                            <span class="input-check__body">--}}
{{--                                                <input class="input-check__input" type="checkbox"--}}
{{--                                                       id="checkout-create-account">--}}
{{--                                                <span class="input-check__box"></span>--}}
{{--                                                <span class="input-check__icon"><svg width="9px" height="7px">--}}
{{--                                                        <path--}}
{{--                                                            d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z"/>--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}
{{--                                            </span>--}}
{{--                                        </span>--}}
{{--                                        <label class="form-check-label" for="checkout-create-account">Create an--}}
{{--                                            account?</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endguest--}}
                        </div>

                        <div class="card-divider"></div>

                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title mb-2">{{ trans('labels.frontend.shop.checkout.shipping_details') }}</h3>
                            {{--                                <div class="form-group">--}}
                            {{--                                    <div class="form-check">--}}
                            {{--                                            <span class="input-check form-check-input">--}}
                            {{--                                                <span class="input-check__body">--}}
                            {{--                                                    <input class="input-check__input" type="checkbox" id="checkout-different-address">--}}
                            {{--                                                    <span class="input-check__box"></span>--}}
                            {{--                                                    <span class="input-check__icon"><svg width="9px" height="7px">--}}
                            {{--                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />--}}
                            {{--                                                        </svg>--}}
                            {{--                                                    </span>--}}
                            {{--                                                </span>--}}
                            {{--                                            </span>--}}
                            {{--                                        <label class="form-check-label" for="checkout-different-address">Ship to a different address?</label>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                                <div class="form-group">--}}
                            {{--                                    <label for="checkout-country">{{ trans('labels.frontend.shop.checkout.region') }}</label>--}}
                            {{--                                    <select id="checkout-country" class="form-control form-control-select2">--}}
                            {{--                                        <option>Select a country...</option>--}}
                            {{--                                        <option>United States</option>--}}
                            {{--                                        <option>Russia</option>--}}
                            {{--                                        <option>Italy</option>--}}
                            {{--                                        <option>France</option>--}}
                            {{--                                        <option>Ukraine</option>--}}
                            {{--                                        <option>Germany</option>--}}
                            {{--                                        <option>Australia</option>--}}
                            {{--                                    </select>--}}
                            {{--                                </div>--}}


                            <div class="checkout__payment-methods payment-methods">
                                <ul class="payment-methods__list">
                                    <li class="payment-methods__item payment-methods__item--active">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="delivery_method"
                                                           type="radio" value="pickup" checked>
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span
                                                class="payment-methods__item-title">{{ trans('labels.frontend.checkout.delivery.provider.pickup') }}</span>
                                        </label>

                                        <div class="payment-methods__item-container">
                                            {{--                                                <div class="payment-methods__item-details text-muted">--}}
                                            {{--                                                    Make your payment directly into our bank account. Please use your Order ID as the payment--}}
                                            {{--                                                    reference. Your order will not be shipped until the funds have cleared in our account.--}}
                                            {{--                                                </div>--}}
                                        </div>
                                    </li>

                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="delivery_method"
                                                           type="radio" value="novaPoshta">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>
                                            <span
                                                class="payment-methods__item-title">{{ trans('labels.frontend.checkout.delivery.provider.nova_poshta') }}</span>
                                        </label>

                                        <div class="payment-methods__item-container px-2">
                                            <div class="form-group mb-2">
                                                <select class="form-control form-control-select2" name="delivery_nova_poshta_region" id="delivery_nova_poshta_region" disabled>
                                                    <option value="">{{ trans('labels.frontend.checkout.delivery.placeholder.region') }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <select class="form-control form-control-select2" name="delivery_nova_poshta_city" id="delivery_nova_poshta_city" disabled>
                                                    <option value="">{{ trans('labels.frontend.checkout.delivery.placeholder.city') }}</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-2">
                                                <select class="form-control form-control-select2" name="delivery_nova_poshta_warehouse" id="delivery_nova_poshta_warehouse" disabled>
                                                    <option value="">{{ trans('labels.frontend.checkout.delivery.placeholder.warehouse') }}</option>
                                                </select>
                                            </div>
                                            {{--                                                <div class="payment-methods__item-details text-muted">--}}
                                            {{--                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.--}}
                                            {{--                                                </div>--}}
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <label for="note">{{ trans('labels.frontend.shop.checkout.notes') }}</label>
                                <textarea class="form-control" name="note" id="note" rows="4" maxlength="455">{{ old('note') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <div class="card mb-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">{{ trans('labels.frontend.shop.checkout.your_order') }}</h3>
                            <table class="checkout__totals">
                                <thead class="checkout__totals-header">
                                <tr>
                                    <th>{{ trans('labels.frontend.shop.checkout.product') }}</th>
                                    <th>{{ trans('labels.frontend.shop.checkout.sum') }}</th>
                                </tr>
                                </thead>

                                <tbody class="checkout__totals-products">
                                @foreach(Cart::getCart() as $productId => $productDetails)
                                    <tr>
                                        <td>{{ $productDetails['title'] }} × {{ $productDetails['quantity'] }}</td>
                                        <td class="text-nowrap">{{ productPriceFormatted($productDetails['price']) }} {{ trans('strings.general.hrn') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>

                                {{--                                    <tbody class="checkout__totals-subtotals">--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th>Subtotal</th>--}}
                                {{--                                        <td>$5877.00</td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th>Store Credit</th>--}}
                                {{--                                        <td>$-20.00</td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    <tr>--}}
                                {{--                                        <th>Shipping</th>--}}
                                {{--                                        <td>$25.00</td>--}}
                                {{--                                    </tr>--}}
                                {{--                                    </tbody>--}}
                                <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>{{ trans('labels.frontend.shop.checkout.total') }}</th>
                                    <td class="text-nowrap">{{ productPriceFormatted(Cart::totalPrice()) }} {{ trans('strings.general.hrn') }}</td>
                                </tr>
                                </tfoot>
                            </table>
                            {{-- checkout_payment_method--}}
                            <div class="checkout__payment-methods payment-methods">
                                <ul class="payment-methods__list">
                                    <li class="payment-methods__item payment-methods__item--active">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="payment_method"
                                                           type="radio" value="cashOnReceipt" checked>
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>

                                            <span
                                                class="payment-methods__item-title">{{ trans('labels.frontend.checkout.payment.method.cash_on_receipt') }}</span>
                                        </label>

                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                {{ trans('labels.frontend.checkout.payment.description.cash_on_receipt') }}
                                            </div>
                                        </div>
                                    </li>

                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="payment_method"
                                                           type="radio" value="cashOnDelivery">
                                                    <span class="input-radio__circle"></span>
                                                </span>
                                            </span>

                                            <span
                                                class="payment-methods__item-title">{{ trans('labels.frontend.checkout.payment.method.cash_on_delivery') }}</span>
                                        </label>

                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                {{ trans('labels.frontend.checkout.payment.description.cash_on_delivery') }}
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-primary btn-xl btn-block">
                                {{ trans('buttons.frontend.shop.place_order') }}
                            </button>

                            <p class="text-muted mt-3">
                                {{ trans('strings.frontend.shop.checkout.read_and_accept_terms_and_conditions') }}
                                <a href="{{ route('frontend.pages.terms') }}"
                                   target="_blank">{{ trans('menus.frontend.pages.terms.title') }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>

    <div class="block-space block-space--layout--before-footer"></div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        const deliveryNovaPoshtaRegionSelector = '#delivery_nova_poshta_region';
        const deliveryNovaPoshtaCitySelector = '#delivery_nova_poshta_city';
        const deliveryNovaPoshtaWarehouseSelector = '#delivery_nova_poshta_warehouse';

        const deliveryNovaPoshtaRegionElement = $(deliveryNovaPoshtaRegionSelector);
        const deliveryNovaPoshtaCityElement = $(deliveryNovaPoshtaCitySelector);
        const deliveryNovaPoshtaWarehouseElement = $(deliveryNovaPoshtaWarehouseSelector);

        deliveryNovaPoshtaRegionElement.select2({width: ''});
        deliveryNovaPoshtaCityElement.select2({width: ''});
        deliveryNovaPoshtaWarehouseElement.select2({width: ''});

        loadNovaPoshtaRegions(deliveryNovaPoshtaRegionSelector, deliveryNovaPoshtaCitySelector, deliveryNovaPoshtaWarehouseSelector);

        deliveryNovaPoshtaRegionElement.change(function () {
            loadNovaPoshtaCities(deliveryNovaPoshtaCitySelector, deliveryNovaPoshtaWarehouseSelector, $(this).val());
        });

        deliveryNovaPoshtaCityElement.change(function () {
            loadNovaPoshtaWarehouses(deliveryNovaPoshtaWarehouseSelector, $(this).val());
        });

        listenDeliveryMethod();
        listenPaymentMethod();
    });

    function loadNovaPoshtaRegions(selectorRegion, selectorCity, selectorWarehouse) {
        $.ajax({
            url: 'api/delivery/nova-poshta/regions',
            headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
            method: 'GET',
            dataType: 'json',
            beforeSend: function () {
                deactivateSelect(selectorRegion);
                deactivateSelect(selectorCity);
                deactivateSelect(selectorWarehouse);
            },
            success: function (response) {
                activateSelect(selectorRegion, response.data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function loadNovaPoshtaCities(selectorCity, selectorWarehouse, regionRef) {
        $.ajax({
            url: 'api/delivery/nova-poshta/cities/' + regionRef,
            headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
            method: 'GET',
            dataType: 'json',
            beforeSend: function () {
                deactivateSelect(selectorCity);
                deactivateSelect(selectorWarehouse);
            },
            success: function (response) {
                activateSelect(selectorCity, response.data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function loadNovaPoshtaWarehouses(selectorWarehouse, cityRef) {
        $.ajax({
            url: 'api/delivery/nova-poshta/warehouses/' + cityRef,
            headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
            method: 'GET',
            dataType: 'json',
            beforeSend: function () {
                deactivateSelect(selectorWarehouse);
            },
            success: function (response) {
                activateSelect(selectorWarehouse, response.data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    function deactivateSelect(selector) {
        $(selector).prop('disabled', true).val('');
        $(selector + ' option').filter((index, option) => option.value !== '').remove();
    }

    function activateSelect(selector, data) {
        $(selector).prop('disabled', false).val('');

        $.each(data, function (index, model) {
            $(selector).append($('<option>', {value: model.id, text: model.descriptionRu}));
        });
    }

    function listenDeliveryMethod() {
        $('[name="delivery_method"]').on('change', function () {
            var currentItem = $(this).closest('.payment-methods__item');
            $(this).closest('.payment-methods__list').find('.payment-methods__item').each(function (i, element) {
                var links = $(element);
                var linksContent = links.find('.payment-methods__item-container');

                if (element !== currentItem[0]) {
                    var startHeight = linksContent.height();
                    linksContent.css('height', startHeight + 'px');
                    links.removeClass('payment-methods__item--active');
                    links.height(); // force reflow

                    linksContent.css('height', '');
                } else {
                    var _startHeight2 = linksContent.height();

                    links.addClass('payment-methods__item--active');
                    var endHeight = linksContent.height();
                    linksContent.css('height', _startHeight2 + 'px');
                    links.height(); // force reflow

                    linksContent.css('height', endHeight + 'px');
                }
            });
        });
    }

    function listenPaymentMethod() {
        $('[name="payment_method"]').on('change', function () {
            var currentItem = $(this).closest('.payment-methods__item');
            $(this).closest('.payment-methods__list').find('.payment-methods__item').each(function (i, element) {
                var links = $(element);
                var linksContent = links.find('.payment-methods__item-container');

                if (element !== currentItem[0]) {
                    var startHeight = linksContent.height();
                    linksContent.css('height', startHeight + 'px');
                    links.removeClass('payment-methods__item--active');
                    links.height(); // force reflow

                    linksContent.css('height', '');
                } else {
                    var _startHeight2 = linksContent.height();

                    links.addClass('payment-methods__item--active');
                    var endHeight = linksContent.height();
                    linksContent.css('height', _startHeight2 + 'px');
                    links.height(); // force reflow

                    linksContent.css('height', endHeight + 'px');
                }
            });
        });
    }
</script>
@endsection

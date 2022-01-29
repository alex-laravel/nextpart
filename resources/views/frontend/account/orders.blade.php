@extends('frontend.layout.main')

@section('meta_title', trans('meta.account.orders.title'))
@section('meta_description', trans('meta.account.orders.description'))
@section('meta_keywords', trans('meta.account.orders.keywords'))

@section('content')
    <div class="site__body">
        <div class="block-space block-space--layout--after-header"></div>
        <div class="block">
            <div class="container container--max--xl">
                <div class="row">
                    <div class="col-12 col-lg-3 d-flex">
                        @include('frontend.account.partials.navigation')
                    </div>

                    <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                        <div class="card">
                            <div class="card-header">
                                <h5>{{ trans('meta.account.orders.title') }}</h5>
                            </div>
                            <div class="card-divider"></div>
                            <div class="card-table">

                                @if (count($orders))
                                    <div class="table-responsive-sm">
                                        <table>
                                            <thead>
                                            <tr>
                                                <th>{{ trans('labels.frontend.account.orders.order') }}</th>
                                                <th>{{ trans('labels.frontend.account.orders.date') }}</th>
                                                <th>{{ trans('labels.frontend.account.orders.status') }}</th>
                                                <th>{{ trans('labels.frontend.account.orders.total') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
{{--                                                    <td><a href="account-order-details.html">#8132</a></td>--}}
                                                    <td>{{ $order->number }}</td>
                                                    <td>{{ $order->created_at ? $order->created_at->format('d/m/Y H:i:s') : '' }}</td>
                                                    <td>{!! $order->statusLabel !!}</td>
                                                    <td>{{ $order->cart_total }}
                                                        {{ trans('strings.general.hrn') }}
                                                        {{ trans('labels.frontend.account.orders.for') }}
                                                        {{ $order->cart_quantity }}
                                                        {{ trans('labels.frontend.account.orders.items') }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <small class="d-block p-3">{{ trans('labels.frontend.account.orders.no_orders') }}</small>
                                @endif
                            </div>

                            <div class="card-divider"></div>

                            <div class="card-footer">
                                @if($orders->hasPages())
                                    {{ $orders->links() }}
                                @endif

{{--                                <ul class="pagination">--}}
{{--                                    <li class="page-item disabled">--}}
{{--                                        <a class="page-link page-link--with-arrow" href="" aria-label="Previous">--}}
{{--                                                <span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg width="7" height="11">--}}
{{--                                                        <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item active" aria-current="page">--}}
{{--                                            <span class="page-link">--}}
{{--                                                2--}}
{{--                                                <span class="sr-only">(current)</span>--}}
{{--                                            </span>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                                    <li class="page-item page-item--dots">--}}
{{--                                        <div class="pagination__dots"></div>--}}
{{--                                    </li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">9</a></li>--}}
{{--                                    <li class="page-item">--}}
{{--                                        <a class="page-link page-link--with-arrow" href="" aria-label="Next">--}}
{{--                                                <span class="page-link__arrow page-link__arrow--right" aria-hidden="true"><svg width="7" height="11">--}}
{{--                                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9--}}
{{--	C-0.1,9.8-0.1,10.4,0.3,10.7z" />--}}
{{--                                                    </svg>--}}
{{--                                                </span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection

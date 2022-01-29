@extends('frontend.layout.main')

@section('meta_title', trans('meta.account.dashboard.title'))
@section('meta_description', trans('meta.account.dashboard.description'))
@section('meta_keywords', trans('meta.account.dashboard.keywords'))

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
                        <div class="dashboard">
                            <div class="dashboard__profile card profile-card">
                                <div class="card-body profile-card__body">
                                    <div class="profile-card__avatar">
                                        <img src="/images/avatars/avatar-4.jpg" alt="">
                                    </div>

                                    <div class="profile-card__name">
                                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    </div>

                                    <div class="profile-card__email">
                                        {{ auth()->user()->email }}
                                    </div>

                                    <div class="profile-card__edit">
                                        <a href="{{ route('frontend.account.profile') }}" class="btn btn-secondary btn-sm">
                                            {{ trans('buttons.frontend.account.dashboard.edit_profile') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="dashboard__address card address-card address-card--featured">
                                <div class="address-card__badge tag-badge tag-badge--theme">
                                    Default
                                </div>

                                <div class="address-card__body">
                                    <div class="address-card__name">
                                        {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                                    </div>

                                    <div class="address-card__row">
                                        <div class="address-card__row-title">
                                            {{ trans('labels.frontend.account.dashboard.email') }}
                                        </div>
                                        <div class="address-card__row-content">
                                            {{ auth()->user()->email }}
                                        </div>
                                    </div>

{{--                                    <div class="address-card__row">--}}
{{--                                        Random Federation<br>--}}
{{--                                        115302, Moscow<br>--}}
{{--                                        ul. Varshavskaya, 15-2-178--}}
{{--                                    </div>--}}

                                    <div class="address-card__row">
                                        <div class="address-card__row-title">
                                            {{ trans('labels.frontend.account.dashboard.phone') }}
                                        </div>

                                        <div class="address-card__row-content">
                                            {{ auth()->user()->phone }}
                                        </div>
                                    </div>

                                    <div class="address-card__footer">
                                        <a href="{{ route('frontend.account.profile') }}">
                                            {{ trans('buttons.frontend.account.dashboard.edit_address') }}
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @if($orders->count())
                            <div class="dashboard__orders card">
                                <div class="card-header">
                                    <h5>{{ trans('labels.frontend.account.dashboard.orders') }}</h5>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-table">
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
                                            @foreach($orders as $order)
                                            <tr>
                                                <td>{{ $order->number }}</td>
                                                <td>{{ $order->created_at ? $order->created_at->format('d/m/Y H:i:s') : '' }}</td>
                                                <td>{!! $order->statusLabel !!}</td>
                                                <td>{{ $order->cart_total }}
                                                    {{ trans('strings.general.hrn') }}
                                                    {{ trans('labels.frontend.account.orders.for') }}
                                                    {{ $order->cart_quantity }}
                                                    {{ trans('labels.frontend.account.orders.items') }}
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection

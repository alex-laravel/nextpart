@extends('backend.layout.main')

@section('title', trans('labels.backend.orders.management') . ' | ' . trans('labels.backend.orders.view'))

@section('header')
    <h1>
        <i class="fa fa-shopping-cart"></i>
        {{ trans('labels.backend.orders.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-warning">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.orders.view') }}</h4>

            <div class="float-right">
                @include('backend.shop-orders.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a class="nav-link active" href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.orders.tabs.titles.overview') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.shop-orders.overview')
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
{{--            <a href="{{ route('backend.orders.edit', $order) }}" class="btn btn-warning btn-sm">{{ trans('buttons.general.edit') }}</a>--}}
            <a href="{{ route('backend.orders.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.back') }}</a>
        </div>
    </div>
@endsection

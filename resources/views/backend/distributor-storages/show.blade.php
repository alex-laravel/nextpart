@extends('backend.layout.main')

@section('title', trans('labels.backend.distributor-storages.management') . ' | ' . trans('labels.backend.distributor-storages.view'))

@section('header')
    <h1>
        <i class="fas fa-pallet"></i>
        {{ trans('labels.backend.distributor-storages.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-warning">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.distributor-storages.view') }}</h4>

            <div class="float-right">
                @include('backend.distributor-storages.partials.header-buttons')
            </div>
        </div>

        <div class="card-body">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a class="nav-link active" href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.distributor-storages.tabs.titles.overview') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.distributor-storages.overview')
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.distributor-storages.edit', $distributorStorage) }}" class="btn btn-warning btn-sm">{{ trans('buttons.general.edit') }}</a>
            <a href="{{ route('backend.distributor-storages.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.back') }}</a>
        </div>
    </div>
@endsection

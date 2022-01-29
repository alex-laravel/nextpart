@extends('backend.layout.main')

@section('title', trans('labels.backend.vehicles.management') . ' | ' . trans('labels.backend.vehicles.view'))

@section('header')
    <h1>
        <i class="fas fa-car"></i>
        {{ trans('labels.backend.vehicles.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-primary">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.vehicles.view') }}</h4>

{{--            <div class="float-right">--}}
{{--                @include('backend.vehicles.partials.header-buttons')--}}
{{--            </div>--}}
        </div>

        <div class="card-body">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a class="nav-link active" href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.vehicles.tabs.titles.overview') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.tecdoc-vehicles.overview')
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.vehicles.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.back') }}</a>
        </div>
    </div>
@endsection

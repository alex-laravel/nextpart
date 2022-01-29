@extends('backend.layout.main')

@section('title', trans('labels.backend.brands.management') . ' | ' . trans('labels.backend.brands.view'))

@section('header')
    <h1>
        <i class="far fa-building"></i>
        {{ trans('labels.backend.brands.management') }}
    </h1>
@endsection

@section('content')
    <div class="card card-accent-primary">
        <div class="card-header">
            <h4 class="d-inline-block">{{ trans('labels.backend.brands.view') }}</h4>
        </div>

        <div class="card-body">
            <div class="nav-tabs-boxed">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="nav-item">
                        <a class="nav-link active" href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('labels.backend.brands.tabs.titles.overview') }}</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane mt-30 active" id="overview">
                        @include('backend.tecdoc-brands.overview')
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <a href="{{ route('backend.brands.index') }}" class="btn btn-secondary btn-sm">{{ trans('buttons.general.back') }}</a>
        </div>
    </div>
@endsection

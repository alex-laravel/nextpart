@extends('frontend.layout.main')

@section('meta_title', trans('meta.auto.vehicles.title') . ' ' . $manufacturer->manuName . ' ' . $modelSeries->modelname)
@section('meta_description', trans('meta.auto.vehicles.description'))
@section('meta_keywords', trans('meta.auto.vehicles.keywords'))

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
                    <h1 class="block-header__title">{{ trans('meta.auto.vehicles.title') . ' ' . $manufacturer->manuName . ' ' . $modelSeries->modelname }}</h1>
                </div>
            </div>
        </div>

        <div class="block block-split">
            <div class="container">
                <div class="block-split__row row no-gutters">
                    <div class="block-split__item block-split__item-content col-auto w-100">
                        <div class="block">
                            <div class="categories-list categories-list--layout--columns-7-full">
                                @if (count($vehicles))
                                    <ul class="categories-list__body">
                                        @foreach ($vehicles as $vehicle)
                                            <li class="categories-list__item">
                                                <a href="{{ route('frontend.auto.vehicle', [$manufacturer->manuId, $modelSeries->modelId, $vehicle->carId]) }}">
                                                    <div class="image image--type--category">
                                                        <div class="image__body">
                                                            @if($vehicle->details->assetThumbnailName)
                                                                <img class="image__tag" src="{{ asset('assets/vehicles/' . $vehicle->details->assetThumbnailName) }}" width="200">
                                                            @else
                                                                <img class="image__tag" src="{{ asset('assets/vehicles/model-default.jpg') }}" width="200">
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="categories-list__item-name">
                                                        {{ $vehicle->carName }}
                                                    </div>
                                                </a>
                                            </li>

                                            <li class="categories-list__divider"></li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="text-center">
                                        <small>{{ trans('strings.frontend.vehicle.no_data') }}</small>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="block-space block-space--layout--divider-nl"></div>
                    </div>
                </div>

                <div class="block-space block-space--layout--before-footer"></div>
            </div>
        </div>
    </div>
@endsection

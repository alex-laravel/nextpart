@extends('frontend.layout.main')

@section('meta_title', trans('meta.home.title'))
@section('meta_description', trans('meta.home.description'))
@section('meta_keywords', trans('meta.home.keywords'))

@section('content')
    {{--    <div class="container">--}}
    {{--        <div class="row justify-content-end">--}}
    {{--            <div class="col-xl-3 col-lg-4 col-md-6 col-12 my-4">--}}
    {{--                <strong class="d-block">Мои автомобили:</strong>--}}

    {{--                @if (count($garageVehicles))--}}
    {{--                    @foreach ($garageVehicles as $garageVehicle)--}}
    {{--                        <div class="card my-2 p-2">--}}
    {{--                            <div class="d-inline-block text-end pb-2">--}}
    {{--                                @if($garageVehicle['selected'])--}}
    {{--                                    <span class="badge bg-success" style="width: 24px">A</span>--}}
    {{--                                @else--}}
    {{--                                    <a href="{{ route('frontend.garage.vehicle.activate', [$garageVehicle['manufacturerId'], $garageVehicle['modelSeriesId'], $garageVehicle['vehicleId']]) }}" class="badge bg-dark" style="width: 24px">A</a>--}}
    {{--                                @endif--}}

    {{--                                <a href="{{ route('frontend.garage.vehicle.delete', [$garageVehicle['manufacturerId'], $garageVehicle['modelSeriesId'], $garageVehicle['vehicleId']]) }}" class="badge bg-danger" style="width: 24px">D</a>--}}
    {{--                            </div>--}}

    {{--                            <small class="d-block">{{ $garageVehicle['manufacturerName'] }} {{ $garageVehicle['modelSeriesName'] }} {{ $garageVehicle['vehicleName'] }}</small>--}}
    {{--                        </div>--}}
    {{--                    @endforeach--}}
    {{--                @else--}}
    {{--                    <small class="d-block">нет выбранных автомобилей</small>--}}
    {{--                @endif--}}
    {{--            </div>--}}
    {{--        </div>--}}
{{--        </div>--}}

    <div class="site__body">
        <div class="block-finder block">
            <div class="decor block-finder__decor decor--type--bottom">
                <div class="decor__body">
                    <div class="decor__start"></div>
                    <div class="decor__end"></div>
                    <div class="decor__center"></div>
                </div>
            </div>
            <div class="block-finder__image" style="background-image: url('images/finder-1903x500.jpg');"></div>
            <div class="block-finder__body container container--max--xl">
                <div class="block-finder__title">{{ trans('labels.frontend.search.title') }}</div>
                <div class="block-finder__subtitle">{{ trans('labels.frontend.search.headline') }}</div>
                <form class="block-finder__form" id="form-finder" action="">
                    <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="make" aria-label="Vehicle Make" id="form-control-finder-manufacturer">
                            <option value="0">{{ trans('labels.frontend.search.placeholder.make') }}</option>

                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->manuId }}">{{ $manufacturer->manuName }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="model" aria-label="Vehicle Model" id="form-control-finder-model" disabled>
                            <option value="0">{{ trans('labels.frontend.search.placeholder.model') }}</option>
                        </select>
                    </div>
                    <div class="block-finder__form-control block-finder__form-control--select">
                        <select name="vehicle" aria-label="Vehicle Engine" id="form-control-finder-vehicle" disabled>
                            <option value="0">{{ trans('labels.frontend.search.placeholder.engine') }}</option>
                        </select>
                    </div>
                    <button class="block-finder__form-control block-finder__form-control--button" type="submit">
                        {{ trans('labels.frontend.search.button.search') }}
                    </button>
                </form>
            </div>
        </div>
        <div class="block-features block block-features--layout--top-strip">
            <div class="container">
                <ul class="block-features__list">
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48">
                                <path d="M44.6,26.9l-1.2-5c0.3-0.1,0.6-0.4,0.6-0.7v-0.8c0-1.7-1.4-3.2-3.2-3.2h-5.7v-1.7c0-0.9-0.7-1.6-1.6-1.6H23.1l6.4-2.6
	c0.4-0.2,0.6-0.6,0.4-1c-0.2-0.4-0.6-0.6-1-0.4l-5.2,2.1c1.6-1,3.2-2.2,3.8-2.9c1.2-1.5,0.9-3.7-0.7-4.9c-1.5-1.2-3.7-0.9-4.9,0.7
	l0,0c-0.9,1.1-2,4.3-2.7,6.5c-0.7-2.2-1.9-5.4-2.7-6.5l0,0c-1.2-1.5-3.4-1.8-4.9-0.7C10,5.5,9.7,7.7,10.9,9.2
	c0.6,0.8,2.2,1.9,3.8,2.9l-5.2-2.1c-0.4-0.2-0.8,0-1,0.4c-0.2,0.4,0,0.8,0.4,1l6.4,2.6H4.8c-0.9,0-1.6,0.7-1.6,1.6v13.6
	C3.2,29.6,3.5,30,4,30c0.4,0,0.8-0.3,0.8-0.8V15.6c0,0,0,0,0,0h28.9c0,0,0,0,0,0v13.6c0,0.4,0.3,0.8,0.8,0.8c0.4,0,0.8-0.3,0.8-0.8
	v-0.9H44c0,0,0,0,0,0c0,0,0,0,0,0c1.1,0,2,0.7,2.3,1.7H44c-0.4,0-0.8,0.3-0.8,0.8v1.6c0,1.3,1.1,2.4,2.4,2.4h0.9v3.3h-2
	c-0.6-1.9-2.4-3.2-4.5-3.2c-2.1,0-3.9,1.3-4.5,3.2h-0.4v-5.7c0-0.4-0.3-0.8-0.8-0.8c-0.4,0-0.8,0.3-0.8,0.8v5.7H18.1
	c-0.6-1.9-2.4-3.2-4.5-3.2c-2.1,0-3.9,1.3-4.5,3.2H4.8c0,0,0,0,0,0v-1.7H8c0.4,0,0.8-0.3,0.8-0.8S8.4,34.9,8,34.9H0.8
	c-0.4,0-0.8,0.3-0.8,0.8s0.3,0.8,0.8,0.8h2.5V38c0,0.9,0.7,1.6,1.6,1.6h4.1c0,0,0,0,0,0c0,2.6,2.1,4.8,4.8,4.8s4.8-2.1,4.8-4.8
	c0,0,0,0,0,0h16.9c0,0,0,0,0,0c0,2.6,2.1,4.8,4.8,4.8s4.8-2.1,4.8-4.8c0,0,0,0,0,0h2.5c0.4,0,0.8-0.3,0.8-0.8v-8
	C48,28.8,46.5,27.2,44.6,26.9z M23.1,5.9L23.1,5.9c0.7-0.9,1.9-1,2.8-0.4s1,1.9,0.4,2.8c-0.3,0.3-1.1,1.2-4.1,3
	c-0.6,0.4-1.2,0.7-1.7,1C21.2,10.1,22.4,6.9,23.1,5.9z M12.1,8.3c-0.7-0.9-0.5-2.1,0.4-2.8c0.4-0.3,0.8-0.4,1.2-0.4
	c0.6,0,1.2,0.3,1.6,0.8l0,0c0.7,1,1.9,4.2,2.6,6.5c-0.5-0.3-1.1-0.6-1.7-1C13.2,9.5,12.4,8.7,12.1,8.3z M35.2,21.9h6.7l1.2,4.9h-7.9
	V21.9z M40.8,18.7c0.9,0,1.7,0.7,1.7,1.7v0h-7.3v-1.7L40.8,18.7L40.8,18.7z M13.6,42.9c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3
	s3.3,1.5,3.3,3.3S15.4,42.9,13.6,42.9z M40,42.9c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3s3.3,1.5,3.3,3.3S41.8,42.9,40,42.9z
	 M45.6,33.3c-0.5,0-0.9-0.4-0.9-0.9v-0.9h1.7v1.7L45.6,33.3L45.6,33.3z"/>
                                <path
                                    d="M13.6,38.1c-0.9,0-1.6,0.7-1.6,1.6s0.7,1.6,1.6,1.6s1.6-0.7,1.6-1.6S14.4,38.1,13.6,38.1z"/>
                                <path
                                    d="M40,38.1c-0.9,0-1.6,0.7-1.6,1.6s0.7,1.6,1.6,1.6c0.9,0,1.6-0.7,1.6-1.6S40.9,38.1,40,38.1z"/>
                                <path
                                    d="M19.2,35.6c0,0.4,0.3,0.8,0.8,0.8h11.2c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H20C19.6,34.9,19.2,35.2,19.2,35.6z"/>
                                <path
                                    d="M2.4,33.2H12c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H2.4c-0.4,0-0.8,0.3-0.8,0.8S1.9,33.2,2.4,33.2z"/>
                                <path d="M12,21.9c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H8.8c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8
	c0.4,0,0.8-0.3,0.8-0.8v-2.5h1.7c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H9.5v-1.7L12,21.9L12,21.9z"/>
                                <path d="M19.1,23.2c0-1.5-1.2-2.8-2.8-2.8h-2c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8c0.4,0,0.8-0.3,0.8-0.8V26h1.3
	l1.4,2.1c0.1,0.2,0.4,0.3,0.6,0.3c0.1,0,0.3,0,0.4-0.1c0.3-0.2,0.4-0.7,0.2-1l-1.1-1.7C18.6,25,19.1,24.2,19.1,23.2z M15.1,21.9h1.3
	c0.7,0,1.3,0.6,1.3,1.3s-0.6,1.3-1.3,1.3h-1.3V21.9z"/>
                                <path d="M24,21.9c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-3.2c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8H24
	c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-2.5v-1.7c0,0,0,0,0,0h1.6c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-1.6c0,0,0,0,0,0v-1.7
	L24,21.9L24,21.9z"/>
                                <path d="M29.6,21.9c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-3.2c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8h3.2
	c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-2.5v-1.7H28c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-0.9v-1.7L29.6,21.9L29.6,21.9z"/>
                            </svg>
                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Free Shipping</div>
                            <div class="block-features__item-subtitle">For orders from $50</div>
                        </div>
                    </li>
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48">
                                <path d="M46.218,18.168h-0.262v-0.869c0-1.175-1.211-1.766-2.453-1.766c-0.521,0-0.985,0.094-1.366,0.263
    c0.015-0.028,2.29-4.591,2.303-4.62c0.968-2.263-3.041-4.024-4.372-1.449l-5.184,10.166c-0.35,0.648-0.364,1.449,0.033,2.081
    c-0.206-0.107-0.432-0.166-0.668-0.166h-4.879c1.555-1.597,6.638-3.535,6.638-8.011c0-1.599-0.676-3.02-1.903-4.002
    c-1.088-0.87-2.52-1.35-4.033-1.35c-2.802,0-5.779,1.758-5.779,5.015c0,2.195,1.426,2.522,2.275,2.522
    c1.653,0,2.545-1.022,2.545-1.983c0-0.485,0.117-0.981,0.981-0.981c0.906,0,1.003,0.623,1.003,0.891
    c0,2.284-7.074,4.474-7.074,8.399v2.178c0,1.147,1.319,1.781,2.23,1.781h7.995c1.426,0,2.332-2.195,1.348-3.669
    c0.265,0.137,0.569,0.21,0.898,0.21h4.552v1.678c0,1.049,1.01,1.781,2.455,1.781s2.455-0.733,2.455-1.781v-1.678h0.262
    c1.02,0,1.781-1.225,1.781-2.32C48,19.144,47.251,18.168,46.218,18.168L46.218,18.168z M34.241,24.861h-7.987
    c-0.389,0-0.802-0.258-0.824-0.375v-2.179c0-3.056,7.074-5.046,7.074-8.399c0-1.107-0.754-2.298-2.41-2.298
    c-1.473,0-2.388,0.915-2.388,2.388c0,0.236-0.405,0.577-1.138,0.577c-0.492,0-0.869-0.082-0.869-1.116
    c0-2.344,2.253-3.609,4.373-3.609c2.251,0,4.53,1.355,4.53,3.946c0,4.526-6.94,5.826-6.94,8.511v0.202
    c0,0.389,0.315,0.703,0.703,0.703l5.882,0c0.091,0.015,0.354,0.314,0.354,0.802C34.601,24.494,34.349,24.825,34.241,24.861
    L34.241,24.861z M46.194,21.402h-0.941c-0.388,0-0.703,0.315-0.703,0.703v2.381c0,0.151-0.44,0.375-1.048,0.375
    c-0.608,0-1.049-0.224-1.049-0.375v-2.381c0-0.389-0.315-0.703-0.703-0.703h-5.255c-0.518,0-0.545-0.528-0.371-0.846
    c0.003-0.006,0.006-0.012,0.009-0.018l5.186-10.17c0.533-1.031,1.883-0.238,1.884,0.097c-0.011,0.087,0.038-0.035-4.014,8.092
    c-0.233,0.468,0.109,1.017,0.629,1.017h1.932c0.388,0,0.703-0.315,0.703-0.703v-1.572c0-0.123,0.409-0.36,1.051-0.36
    c0.618,0,1.046,0.223,1.046,0.36v1.572c0,0.389,0.315,0.703,0.703,0.703h0.966c0.196,0,0.375,0.435,0.375,0.914
    C46.593,20.951,46.324,21.338,46.194,21.402L46.194,21.402z M41.046,17.984v0.184h-0.092L41.046,17.984z M41.046,17.984"/>
                                <path d="M36.976,36.602c2.428-2.291,4.227-5.18,5.202-8.354c0.114-0.371-0.094-0.764-0.465-0.879
    c-0.371-0.114-0.765,0.095-0.879,0.466c-0.903,2.941-2.571,5.62-4.823,7.744c-0.282,0.267-0.295,0.712-0.029,0.994
    C36.249,36.856,36.694,36.869,36.976,36.602L36.976,36.602z M36.976,36.602"/>
                                <path d="M35.099,7.86c0.226-0.316,0.152-0.756-0.164-0.981C29.684,3.131,23.098,2.38,17.381,4.38
    c-0.367,0.128-0.559,0.53-0.431,0.896c0.128,0.366,0.53,0.56,0.896,0.431c5.23-1.83,11.346-1.199,16.272,2.316
    C34.434,8.249,34.873,8.176,35.099,7.86L35.099,7.86z M35.099,7.86"/>
                                <path d="M25.247,43.573c-0.857-0.491-1.854-0.639-2.807-0.416c-0.525,0.123-1.064,0.207-1.602,0.251
    c-0.387,0.032-0.675,0.371-0.643,0.758c0.032,0.387,0.37,0.675,0.758,0.644c0.606-0.05,1.214-0.145,1.807-0.284
    c0.606-0.141,1.241-0.047,1.788,0.267c1.583,0.908,3.528,0.884,5.076-0.064c3.605-2.207,3.212-1.964,3.359-2.061
    c2.24-1.464,2.922-4.464,1.519-6.755l-2.538-4.145c-1.436-2.345-4.508-3.068-6.835-1.644l-3.235,1.981
    c-1.472,0.901-2.358,2.477-2.371,4.214c-0.001,0.153-0.145,0.269-0.293,0.237c-1.228-0.265-2.372-0.847-3.306-1.683
    c-1.403-1.255-2.633-2.596-3.656-3.984c-0.23-0.313-0.67-0.379-0.983-0.149c-0.313,0.23-0.379,0.671-0.149,0.983
    c1.08,1.465,2.375,2.878,3.85,4.197c1.116,0.999,2.481,1.694,3.947,2.01c1.02,0.22,1.988-0.557,1.996-1.602
    c0.009-1.248,0.644-2.379,1.699-3.025l2.742-1.679l6.261,10.224l-2.742,1.679C27.78,44.209,26.384,44.225,25.247,43.573
    L25.247,43.573z M26.622,30.977c1.54-0.495,3.282,0.119,4.142,1.525l2.538,4.145c0.865,1.413,0.611,3.242-0.524,4.383
    L26.622,30.977z M26.622,30.977"/>
                                <path d="M0.403,23.192c0.998,3.783,2.422,7.199,4.232,10.155c1.81,2.956,4.206,5.777,7.121,8.386
    c1.613,1.443,3.59,2.435,5.717,2.868c0.377,0.078,0.751-0.165,0.83-0.549c0.078-0.381-0.168-0.752-0.549-0.829
    c-1.883-0.383-3.632-1.261-5.06-2.538c-2.813-2.517-5.121-5.233-6.859-8.072c-1.739-2.839-3.108-6.13-4.071-9.78
    c-0.902-3.419-0.07-7.084,2.228-9.803c0.632-0.748,0.954-1.704,0.906-2.69C4.834,9.03,5.483,7.795,6.592,7.116l2.742-1.679
    l6.261,10.224l-2.742,1.679c-1.043,0.639-2.327,0.696-3.436,0.153c-0.93-0.455-2.048,0.053-2.319,1.052
    c-0.396,1.462-0.401,3.008-0.015,4.47c0.558,2.115,1.315,4.081,2.249,5.843c0.182,0.343,0.608,0.474,0.951,0.292
    c0.343-0.182,0.474-0.608,0.292-0.951c-0.884-1.667-1.601-3.532-2.132-5.543c-0.323-1.225-0.319-2.519,0.012-3.744
    c0.04-0.147,0.206-0.223,0.342-0.156c1.543,0.756,3.334,0.675,4.789-0.216l3.235-1.981c2.322-1.422,3.082-4.485,1.643-6.835
    l-2.538-4.145c-1.44-2.351-4.516-3.063-6.835-1.643L5.858,5.917C4.31,6.864,3.404,8.585,3.493,10.409
    c0.031,0.63-0.174,1.239-0.575,1.714C0.324,15.192-0.616,19.33,0.403,23.192L0.403,23.192z M14.728,6.314l2.538,4.145
    c0.865,1.414,0.61,3.243-0.524,4.383L10.586,4.788C12.12,4.295,13.864,4.903,14.728,6.314L14.728,6.314z M14.728,6.314"/>
                            </svg>
                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Support 24/7</div>
                            <div class="block-features__item-subtitle">Call us anytime</div>
                        </div>
                    </li>
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48">
                                <path d="M30,34.4H2.5c-0.5,0-0.9-0.4-0.9-0.9V7.7c0-0.5,0.4-0.9,0.9-0.9H42c0.5,0,0.9,0.4,0.9,0.9v11.2c0,0.4,0.4,0.8,0.8,0.8
	c0.4,0,0.8-0.4,0.8-0.8V7.7c0-1.4-1.1-2.5-2.5-2.5H2.5C1.1,5.2,0,6.3,0,7.7v25.8C0,34.8,1.1,36,2.5,36H30c0.4,0,0.8-0.4,0.8-0.8
	C30.8,34.7,30.5,34.4,30,34.4z"/>
                                <path d="M15.4,18v-5.2c0-0.9-0.7-1.7-1.7-1.7H6.8c-0.9,0-1.7,0.7-1.7,1.7V18c0,0.9,0.7,1.7,1.7,1.7h6.9C14.6,19.7,15.4,18.9,15.4,18
	z M13.7,12.8V18c0,0,0,0.1-0.1,0.1h-3.5v-1.8h0.9c0.4,0,0.8-0.4,0.8-0.8c0-0.4-0.4-0.8-0.8-0.8h-0.9v-1.8L13.7,12.8
	C13.7,12.8,13.7,12.8,13.7,12.8z M6.8,18v-5.2c0,0,0-0.1,0.1-0.1h1.8V18L6.8,18C6.8,18,6.8,18,6.8,18z"/>
                                <path d="M32.2,11.1c-0.8-0.5-1.7-0.8-2.6-0.8c-2.6,0-4.7,2.1-4.7,4.7s2.1,4.7,4.7,4.7c1,0,1.8-0.3,2.6-0.8c0.8,0.5,1.7,0.8,2.6,0.8
	c2.6,0,4.7-2.1,4.7-4.7s-2.1-4.7-4.7-4.7C33.8,10.3,32.9,10.6,32.2,11.1z M26.5,15c0-1.7,1.4-3.1,3.1-3.1c0.5,0,0.9,0.1,1.4,0.3
	C30.4,13,30.1,14,30.1,15c0,1,0.3,1.9,0.9,2.7c-0.4,0.2-0.9,0.3-1.4,0.3C27.9,18,26.5,16.7,26.5,15z M37.8,15c0,1.7-1.4,3.1-3.1,3.1
	c-0.5,0-0.9-0.1-1.4-0.3c0.6-0.8,0.9-1.7,0.9-2.7c0-0.4-0.4-0.8-0.8-0.8s-0.8,0.4-0.8,0.8c0,0.6-0.2,1.2-0.5,1.6
	c-0.3-0.5-0.5-1.1-0.5-1.6c0-1.7,1.4-3.1,3.1-3.1C36.4,11.9,37.8,13.3,37.8,15z"/>
                                <path
                                    d="M6,24.1c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h6.9c0.4,0,0.8-0.4,0.8-0.8c0-0.4-0.4-0.8-0.8-0.8H6z"/>
                                <path
                                    d="M30.9,29.2H6c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h24.9c0.4,0,0.8-0.4,0.8-0.8S31.3,29.2,30.9,29.2z"/>
                                <path
                                    d="M16.3,24.1c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h6.9c0.4,0,0.8-0.4,0.8-0.8c0-0.4-0.4-0.8-0.8-0.8H16.3z"/>
                                <path
                                    d="M31.7,24.1h-5.2c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h5.2c0.4,0,0.8-0.4,0.8-0.8C32.5,24.4,32.2,24.1,31.7,24.1z"/>
                                <path d="M46.3,30.2v-3.6c0-3.3-2.7-6-6-6c-3.3,0-6,2.7-6,6v3.6c-1,0.3-1.7,1.3-1.7,2.4v7.7c0,1.4,1.1,2.5,2.5,2.5h10.3
	c1.4,0,2.5-1.1,2.5-2.5v-7.7C48,31.5,47.3,30.5,46.3,30.2z M40.3,22.2c2.4,0,4.3,2,4.3,4.3v3.5H36v-3.5C36,24.2,37.9,22.2,40.3,22.2
	z M46.4,40.3c0,0.5-0.4,0.9-0.9,0.9H35.2c-0.5,0-0.9-0.4-0.9-0.9v-7.7c0-0.5,0.4-0.9,0.9-0.9h10.3c0.5,0,0.9,0.4,0.9,0.9V40.3z"/>
                                <path d="M40.3,33.5c-1.2,0-2.1,0.9-2.1,2.1c0,0.9,0.5,1.6,1.3,1.9v1.1c0,0.4,0.4,0.8,0.8,0.8s0.8-0.4,0.8-0.8v-1.1
	c0.8-0.3,1.3-1.1,1.3-1.9C42.4,34.4,41.5,33.5,40.3,33.5z M40.3,35.1c0.3,0,0.5,0.2,0.5,0.5s-0.2,0.5-0.5,0.5s-0.5-0.2-0.5-0.5
	S40.1,35.1,40.3,35.1z"/>
                            </svg>
                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">100% Safety</div>
                            <div class="block-features__item-subtitle">Only secure payments</div>
                        </div>
                    </li>
                    <li class="block-features__item">
                        <div class="block-features__item-icon">
                            <svg width="48" height="48" viewBox="0 0 48 48">
                                <path d="M48,3.3c0-0.9-0.3-1.7-1-2.3c-0.6-0.6-1.4-1-2.3-1c-0.9,0-1.7,0.3-2.3,1c-0.3,0.3-0.7,0.8-1,1.1c-0.3,0.3-0.2,0.8,0.1,1.1
	c0.3,0.3,0.8,0.2,1.1-0.1c0.4-0.5,0.7-0.9,0.9-1c0.3-0.3,0.8-0.5,1.2-0.5c0,0,0,0,0,0c0.5,0,0.9,0.2,1.2,0.5
	c0.3,0.3,0.5,0.8,0.5,1.2c0,0.5-0.2,0.9-0.5,1.2c-0.3,0.3-1.3,1.1-2.7,2.1c-0.9-1.5-2.4-2.4-4.3-2.4H27.5c-1.5,0-3,0.6-4.1,1.7
	L0.7,28.6C0.3,29,0,29.7,0,30.3s0.3,1.3,0.7,1.7L16,47.3c0.5,0.5,1.1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l22.8-22.8
	c1.1-1.1,1.7-2.5,1.7-4.1V9.1c0-0.3,0-0.7-0.1-1C45.4,7,46.6,6,47,5.6C47.7,5,48,4.1,48,3.3z M42.3,9.1v11.4c0,1.1-0.4,2.2-1.2,3
	L18.3,46.2c-0.3,0.3-0.9,0.3-1.2,0L1.8,30.9c-0.3-0.3-0.3-0.9,0-1.2L24.6,6.9c0.8-0.8,1.8-1.2,3-1.2h11.4c1.3,0,2.4,0.7,3,1.8
	c-0.9,0.6-1.9,1.3-3,1.9c0,0-0.1-0.1-0.1-0.1c-1.3-1.3-3.3-1.3-4.6,0s-1.3,3.3,0,4.6c0.6,0.6,1.5,1,2.3,1c0.8,0,1.7-0.3,2.3-1
	c0.9-0.9,1.1-2.1,0.8-3.1C40.6,10.2,41.5,9.6,42.3,9.1C42.3,9.1,42.3,9.1,42.3,9.1z M35.7,11.9c0.1,0.3,0.4,0.4,0.7,0.4
	c0.1,0,0.2,0,0.3-0.1c0.5-0.2,0.9-0.5,1.4-0.7c0,0.4-0.2,0.9-0.5,1.2c-0.7,0.7-1.8,0.7-2.4,0c-0.7-0.7-0.7-1.8,0-2.4
	c0.3-0.3,0.8-0.5,1.2-0.5c0.3,0,0.7,0.1,1,0.3c-0.4,0.2-0.9,0.5-1.3,0.7C35.7,11.1,35.6,11.5,35.7,11.9z"/>
                                <path d="M16.3,25.8c-0.3-0.3-0.8-0.3-1.1,0c-0.3,0.3-0.3,0.8,0,1.1l2.4,2.4l-3,3l-2.4-2.4c-0.3-0.3-0.8-0.3-1.1,0
	c-0.3,0.3-0.3,0.8,0,1.1l5.9,5.9c0.2,0.2,0.4,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1l-2.4-2.4l3-3l2.4,2.4
	c0.2,0.2,0.4,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L16.3,25.8z"/>
                                <path d="M24.8,21.4c-1.4-1.4-3.8-1.4-5.2,0s-1.4,3.8,0,5.2l1.8,1.8c0.7,0.7,1.7,1.1,2.6,1.1s1.9-0.4,2.6-1.1c1.4-1.4,1.4-3.8,0-5.2
	L24.8,21.4z M25.5,27.3c-0.8,0.8-2.2,0.8-3,0l-1.8-1.8c-0.8-0.8-0.8-2.2,0-3c0.4-0.4,1-0.6,1.5-0.6s1.1,0.2,1.5,0.6l1.8,1.8
	C26.3,25.1,26.3,26.5,25.5,27.3z"/>
                                <path d="M27.4,15.8l1.8-1.8c0.3-0.3,0.3-0.8,0-1.1c-0.3-0.3-0.8-0.3-1.1,0l-4.7,4.7c-0.3,0.3-0.3,0.8,0,1.1c0.2,0.2,0.4,0.2,0.5,0.2
	s0.4-0.1,0.5-0.2l1.8-1.8l5.3,5.3c0.2,0.2,0.4,0.2,0.5,0.2c0.2,0,0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L27.4,15.8z"/>
                            </svg>
                        </div>
                        <div class="block-features__item-info">
                            <div class="block-features__item-title">Hot Offers</div>
                            <div class="block-features__item-subtitle">Discounts up to 90%</div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-products-carousel" data-layout="grid-5">
            <div class="container">
                <div class="section-header">
                    <div class="section-header__body">
                        <h2 class="section-header__title">Featured Products</h2>
                        <div class="section-header__spring"></div>
                        <ul class="section-header__groups">
                            <li class="section-header__groups-item">
                                <button type="button"
                                        class="section-header__groups-button section-header__groups-button--active">All
                                </button>
                            </li>
                            <li class="section-header__groups-item">
                                <button type="button" class="section-header__groups-button">Power Tools</button>
                            </li>
                            <li class="section-header__groups-item">
                                <button type="button" class="section-header__groups-button">Hand Tools</button>
                            </li>
                            <li class="section-header__groups-item">
                                <button type="button" class="section-header__groups-button">Plumbing</button>
                            </li>
                        </ul>
                        <div class="section-header__arrows">
                            <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path
                                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="section-header__divider"></div>
                    </div>
                </div>
                <div class="block-products-carousel__carousel">
                    <div class="block-products-carousel__carousel-loader"></div>
                    <div class="owl-carousel">
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-1-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 140-10440-B
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    <div class="tag-badge tag-badge--sale">sale</div>
                                                    <div class="tag-badge tag-badge--new">new</div>
                                                    <div class="tag-badge tag-badge--hot">hot</div>
                                                </div>
                                                <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$19.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-2-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 573-23743-C
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">5 on 22 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$224.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-3-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 009-50078-Z
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    <div class="tag-badge tag-badge--sale">sale</div>
                                                </div>
                                                <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">3 on 14 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--new">$349.00</div>
                                            <div class="product-card__price product-card__price--old">$415.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-4-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> A43-44328-B
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    <div class="tag-badge tag-badge--hot">hot</div>
                                                </div>
                                                <a href="product-full.html">Glossy Gray 19" Aluminium Wheel AR-19</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 26 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$589.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-5-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 729-51203-B
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 9 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$749.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-6-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 573-49386-C
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Motor Oil Level 5</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">5 on 2 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$23.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-7-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 753-38573-B
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Engine Block Z4</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">0 on 0 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$452.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-8-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 472-67382-Z
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Clutch Discs Z175</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">3 on 7 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$345.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-9-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 855-78336-G
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Manual Five Speed Gearbox</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 6 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$879.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--grid">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--wishlist"
                                                type="button" aria-label="Add to wish list">
                                            <svg width="16" height="16">
                                                <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                            </svg>
                                        </button>
                                        <button class="product-card__action product-card__action--compare" type="button"
                                                aria-label="Add to compare">
                                            <svg width="16" height="16">
                                                <path
                                                    d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                <path
                                                    d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                <path
                                                    d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-10-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                        <div
                                            class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                            <div class="status-badge__body">
                                                <div class="status-badge__icon">
                                                    <svg width="13" height="13">
                                                        <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                    </svg>
                                                </div>
                                                <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                <div class="status-badge__tooltip" tabindex="0" data-toggle="tooltip"
                                                     title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__meta"><span
                                                class="product-card__meta-title">SKU:</span> 473-75662-R
                                        </div>
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Set of Car Floor Mats Brandix Z4</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 16 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$78.00</div>
                                        </div>
                                        <button class="product-card__addtocart-icon" type="button"
                                                aria-label="Add to cart">
                                            <svg width="20" height="20">
                                                <circle cx="7" cy="17" r="2"/>
                                                <circle cx="15" cy="17" r="2"/>
                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-sale">
            <div class="block-sale__content">
                <div class="block-sale__header">
                    <div class="block-sale__title">Attention! Deal Zone</div>
                    <div class="block-sale__subtitle">Hurry up! Discounts up to 70%</div>
                    <div class="block-sale__timer">
                        <div class="timer">
                            <div class="timer__part">
                                <div class="timer__part-value timer__part-value--days">02</div>
                                <div class="timer__part-label">Days</div>
                            </div>
                            <div class="timer__dots"></div>
                            <div class="timer__part">
                                <div class="timer__part-value timer__part-value--hours">23</div>
                                <div class="timer__part-label">Hrs</div>
                            </div>
                            <div class="timer__dots"></div>
                            <div class="timer__part">
                                <div class="timer__part-value timer__part-value--minutes">07</div>
                                <div class="timer__part-label">Mins</div>
                            </div>
                            <div class="timer__dots"></div>
                            <div class="timer__part">
                                <div class="timer__part-value timer__part-value--seconds">54</div>
                                <div class="timer__part-label">Secs</div>
                            </div>
                        </div>
                    </div>
                    <div class="block-sale__controls">
                        <div class="arrow block-sale__arrow block-sale__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11">
                                    <path
                                        d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="block-sale__link"><a href="">View All Available Offers</a></div>
                        <div class="arrow block-sale__arrow block-sale__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11">
                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="decor block-sale__header-decor decor--type--center">
                            <div class="decor__body">
                                <div class="decor__start"></div>
                                <div class="decor__end"></div>
                                <div class="decor__center"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-sale__body">
                    <div class="decor block-sale__body-decor decor--type--bottom">
                        <div class="decor__body">
                            <div class="decor__start"></div>
                            <div class="decor__end"></div>
                            <div class="decor__center"></div>
                        </div>
                    </div>
                    <div class="block-sale__image" style="background-image: url('images/sale-1903x640.jpg');"></div>
                    <div class="container">
                        <div class="block-sale__carousel">
                            <div class="owl-carousel">
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-1-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 140-10440-B
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        <div class="tag-badge tag-badge--sale">sale</div>
                                                        <div class="tag-badge tag-badge--new">new</div>
                                                        <div class="tag-badge tag-badge--hot">hot</div>
                                                    </div>
                                                    <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">4 on 3 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$19.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-2-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 573-23743-C
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">5 on 22 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$224.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-3-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 009-50078-Z
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        <div class="tag-badge tag-badge--sale">sale</div>
                                                    </div>
                                                    <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">3 on 14 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--new">$349.00</div>
                                                <div class="product-card__price product-card__price--old">$415.00</div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-4-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> A43-44328-B
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <div class="product-card__badges">
                                                        <div class="tag-badge tag-badge--hot">hot</div>
                                                    </div>
                                                    <a href="product-full.html">Glossy Gray 19" Aluminium Wheel
                                                        AR-19</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">4 on 26 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$589.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-5-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 729-51203-B
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">4 on 9 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$749.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-6-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 573-49386-C
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <a href="product-full.html">Motor Oil Level 5</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">5 on 2 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$23.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-7-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 753-38573-B
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <a href="product-full.html">Brandix Engine Block Z4</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star"></div>
                                                        <div class="rating__star"></div>
                                                        <div class="rating__star"></div>
                                                        <div class="rating__star"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">0 on 0 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$452.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="block-sale__item">
                                    <div class="product-card">
                                        <div class="product-card__actions-list">
                                            <button class="product-card__action product-card__action--quickview"
                                                    type="button" aria-label="Quick view">
                                                <svg width="16" height="16">
                                                    <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--wishlist"
                                                    type="button" aria-label="Add to wish list">
                                                <svg width="16" height="16">
                                                    <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                </svg>
                                            </button>
                                            <button class="product-card__action product-card__action--compare"
                                                    type="button" aria-label="Add to compare">
                                                <svg width="16" height="16">
                                                    <path
                                                        d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                    <path
                                                        d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                    <path
                                                        d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="product-card__image">
                                            <div class="image image--type--product">
                                                <a href="product-full.html" class="image__body">
                                                    <img class="image__tag" src="images/products/product-8-245x245.jpg"
                                                         alt="">
                                                </a>
                                            </div>
                                            <div
                                                class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                <div class="status-badge__body">
                                                    <div class="status-badge__icon">
                                                        <svg width="13" height="13">
                                                            <path
                                                                d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                        </svg>
                                                    </div>
                                                    <div class="status-badge__text">Part Fit for 2011 Ford Focus S</div>
                                                    <div class="status-badge__tooltip" tabindex="0"
                                                         data-toggle="tooltip"
                                                         title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-card__info">
                                            <div class="product-card__meta"><span
                                                    class="product-card__meta-title">SKU:</span> 472-67382-Z
                                            </div>
                                            <div class="product-card__name">
                                                <div>
                                                    <a href="product-full.html">Brandix Clutch Discs Z175</a>
                                                </div>
                                            </div>
                                            <div class="product-card__rating">
                                                <div class="rating product-card__rating-stars">
                                                    <div class="rating__body">
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star rating__star--active"></div>
                                                        <div class="rating__star"></div>
                                                        <div class="rating__star"></div>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating-label">3 on 7 reviews</div>
                                            </div>
                                        </div>
                                        <div class="product-card__footer">
                                            <div class="product-card__prices">
                                                <div class="product-card__price product-card__price--current">$345.00
                                                </div>
                                            </div>
                                            <button class="product-card__addtocart-icon" type="button"
                                                    aria-label="Add to cart">
                                                <svg width="20" height="20">
                                                    <circle cx="7" cy="17" r="2"/>
                                                    <circle cx="15" cy="17" r="2"/>
                                                    <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-lg"></div>
        <div class="block block-zone">
            <div class="container">
                <div class="block-zone__body">
                    <div class="block-zone__card category-card category-card--layout--overlay">
                        <div class="category-card__body">
                            <div class="category-card__overlay-image">
                                <img
                                    srcset="images/categories/category-overlay-1-mobile.jpg 530w, images/categories/category-overlay-1.jpg 305w"
                                    src="images/categories/category-overlay-1.jpg"
                                    sizes="(max-width: 575px) 530px, 305px" alt="">
                            </div>
                            <div class="category-card__overlay-image category-card__overlay-image--blur">
                                <img
                                    srcset="images/categories/category-overlay-1-mobile.jpg 530w, images/categories/category-overlay-1.jpg 305w"
                                    src="images/categories/category-overlay-1.jpg"
                                    sizes="(max-width: 575px) 530px, 305px" alt="">
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__info">
                                    <div class="category-card__name">
                                        <a href="category-4-columns-sidebar.html">Колеса и шины</a>
                                    </div>
                                    <ul class="category-card__children">
                                        <li><a href="category-4-columns-sidebar.html">Колпаки на колеса</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Комплекты тормозов</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Цепи для шин</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Колесные диски</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Шины</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Датчики</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Аксессуары</a></li>
                                    </ul>
                                    <div class="category-card__actions">
                                        <a href="shop-grid-4-columns-sidebar.html" class="btn btn-primary btn-sm">Shop
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-zone__widget">
                        <div class="block-zone__widget-header">
                            <div class="block-zone__tabs">
                                <button class="block-zone__tabs-button block-zone__tabs-button--active" type="button">
                                    Featured
                                </button>
                                <button class="block-zone__tabs-button" type="button">Bestsellers</button>
                                <button class="block-zone__tabs-button" type="button">Popular</button>
                            </div>
                            <div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path
                                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="arrow block-zone__arrow block-zone__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="block-zone__widget-body">
                            <div class="block-zone__carousel">
                                <div class="block-zone__carousel-loader"></div>
                                <div class="owl-carousel">
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-1-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    140-10440-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--sale">sale</div>
                                                            <div class="tag-badge tag-badge--new">new</div>
                                                            <div class="tag-badge tag-badge--hot">hot</div>
                                                        </div>
                                                        <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 3 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $19.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-2-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    573-23743-C
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">5 on 22 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $224.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-3-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    009-50078-Z
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--sale">sale</div>
                                                        </div>
                                                        <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">3 on 14 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--new">$349.00
                                                    </div>
                                                    <div class="product-card__price product-card__price--old">$415.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-4-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    A43-44328-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--hot">hot</div>
                                                        </div>
                                                        <a href="product-full.html">Glossy Gray 19" Aluminium Wheel
                                                            AR-19</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 26 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $589.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-5-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    729-51203-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Twin Exhaust Pipe From Brandix
                                                            Z54</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 9 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $749.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-6-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    573-49386-C
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Motor Oil Level 5</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">5 on 2 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $23.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-7-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    753-38573-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Engine Block Z4</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">0 on 0 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $452.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-8-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    472-67382-Z
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Clutch Discs Z175</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">3 on 7 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $345.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-sm"></div>
        <div class="block block-zone">
            <div class="container">
                <div class="block-zone__body">
                    <div class="block-zone__card category-card category-card--layout--overlay">
                        <div class="category-card__body">
                            <div class="category-card__overlay-image">
                                <img
                                    srcset="images/categories/category-overlay-2-mobile.jpg 530w, images/categories/category-overlay-2.jpg 305w"
                                    src="images/categories/category-overlay-2.jpg"
                                    sizes="(max-width: 575px) 530px, 305px" alt="">
                            </div>
                            <div class="category-card__overlay-image category-card__overlay-image--blur">
                                <img
                                    srcset="images/categories/category-overlay-2-mobile.jpg 530w, images/categories/category-overlay-2.jpg 305w"
                                    src="images/categories/category-overlay-2.jpg"
                                    sizes="(max-width: 575px) 530px, 305px" alt="">
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__info">
                                    <div class="category-card__name">
                                        <a href="category-4-columns-sidebar.html">Детали интерьера</a>
                                    </div>
                                    <ul class="category-card__children">
                                        <li><a href="category-4-columns-sidebar.html">Приборные панели</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Чехлы на сиденья</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Коврики</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Солнцезащитные очки</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Козырьки</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Автомобильные чехлы</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Аксессуары</a></li>
                                    </ul>
                                    <div class="category-card__actions">
                                        <a href="shop-grid-4-columns-sidebar.html" class="btn btn-primary btn-sm">Shop
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-zone__widget">
                        <div class="block-zone__widget-header">
                            <div class="block-zone__tabs">
                                <button class="block-zone__tabs-button block-zone__tabs-button--active" type="button">
                                    Featured
                                </button>
                                <button class="block-zone__tabs-button" type="button">Bestsellers</button>
                                <button class="block-zone__tabs-button" type="button">Popular</button>
                            </div>
                            <div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path
                                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="arrow block-zone__arrow block-zone__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="block-zone__widget-body">
                            <div class="block-zone__carousel">
                                <div class="block-zone__carousel-loader"></div>
                                <div class="owl-carousel">
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-1-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    140-10440-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--sale">sale</div>
                                                            <div class="tag-badge tag-badge--new">new</div>
                                                            <div class="tag-badge tag-badge--hot">hot</div>
                                                        </div>
                                                        <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 3 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $19.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-2-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    573-23743-C
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">5 on 22 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $224.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-3-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    009-50078-Z
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--sale">sale</div>
                                                        </div>
                                                        <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">3 on 14 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--new">$349.00
                                                    </div>
                                                    <div class="product-card__price product-card__price--old">$415.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-4-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    A43-44328-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--hot">hot</div>
                                                        </div>
                                                        <a href="product-full.html">Glossy Gray 19" Aluminium Wheel
                                                            AR-19</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 26 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $589.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-5-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    729-51203-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Twin Exhaust Pipe From Brandix
                                                            Z54</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 9 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $749.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-6-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    573-49386-C
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Motor Oil Level 5</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">5 on 2 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $23.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-7-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    753-38573-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Engine Block Z4</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">0 on 0 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $452.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-8-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    472-67382-Z
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Clutch Discs Z175</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">3 on 7 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $345.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-sm"></div>
        <div class="block block-zone">
            <div class="container">
                <div class="block-zone__body">
                    <div class="block-zone__card category-card category-card--layout--overlay">
                        <div class="category-card__body">
                            <div class="category-card__overlay-image">
                                <img
                                    srcset="images/categories/category-overlay-3-mobile.jpg 530w, images/categories/category-overlay-3.jpg 305w"
                                    src="images/categories/category-overlay-3.jpg"
                                    sizes="(max-width: 575px) 530px, 305px" alt="">
                            </div>
                            <div class="category-card__overlay-image category-card__overlay-image--blur">
                                <img
                                    srcset="images/categories/category-overlay-3-mobile.jpg 530w, images/categories/category-overlay-3.jpg 305w"
                                    src="images/categories/category-overlay-3.jpg"
                                    sizes="(max-width: 575px) 530px, 305px" alt="">
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__info">
                                    <div class="category-card__name">
                                        <a href="category-4-columns-sidebar.html">Двигатель и трансмиссия</a>
                                    </div>
                                    <ul class="category-card__children">
                                        <li><a href="category-4-columns-sidebar.html">Ремни ГРМ</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Свечи зажигания</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Масляные поддоны</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Прокладки двигателя</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Масляные фильтры</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Крепления двигателя</a></li>
                                        <li><a href="category-4-columns-sidebar.html">Аксессуары</a></li>
                                    </ul>
                                    <div class="category-card__actions">
                                        <a href="shop-grid-4-columns-sidebar.html" class="btn btn-primary btn-sm">Shop
                                            All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-zone__widget">
                        <div class="block-zone__widget-header">
                            <div class="block-zone__tabs">
                                <button class="block-zone__tabs-button block-zone__tabs-button--active" type="button">
                                    Featured
                                </button>
                                <button class="block-zone__tabs-button" type="button">Bestsellers</button>
                                <button class="block-zone__tabs-button" type="button">Popular</button>
                            </div>
                            <div class="arrow block-zone__arrow block-zone__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path
                                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="arrow block-zone__arrow block-zone__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="block-zone__widget-body">
                            <div class="block-zone__carousel">
                                <div class="block-zone__carousel-loader"></div>
                                <div class="owl-carousel">
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-1-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    140-10440-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--sale">sale</div>
                                                            <div class="tag-badge tag-badge--new">new</div>
                                                            <div class="tag-badge tag-badge--hot">hot</div>
                                                        </div>
                                                        <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 3 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $19.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-2-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    573-23743-C
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">5 on 22 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $224.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-3-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    009-50078-Z
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--sale">sale</div>
                                                        </div>
                                                        <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">3 on 14 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--new">$349.00
                                                    </div>
                                                    <div class="product-card__price product-card__price--old">$415.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-4-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    A43-44328-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <div class="product-card__badges">
                                                            <div class="tag-badge tag-badge--hot">hot</div>
                                                        </div>
                                                        <a href="product-full.html">Glossy Gray 19" Aluminium Wheel
                                                            AR-19</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 26 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $589.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-5-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    729-51203-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Twin Exhaust Pipe From Brandix
                                                            Z54</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">4 on 9 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $749.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-6-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    573-49386-C
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Motor Oil Level 5</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">5 on 2 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $23.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-7-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    753-38573-B
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Engine Block Z4</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">0 on 0 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $452.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-zone__carousel-item">
                                        <div class="product-card">
                                            <div class="product-card__actions-list">
                                                <button class="product-card__action product-card__action--quickview"
                                                        type="button" aria-label="Quick view">
                                                    <svg width="16" height="16">
                                                        <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--wishlist"
                                                        type="button" aria-label="Add to wish list">
                                                    <svg width="16" height="16">
                                                        <path d="M13.9,8.4l-5.4,5.4c-0.3,0.3-0.7,0.3-1,0L2.1,8.4c-1.5-1.5-1.5-3.8,0-5.3C2.8,2.4,3.8,2,4.8,2s1.9,0.4,2.6,1.1L8,3.7
	l0.6-0.6C9.3,2.4,10.3,2,11.3,2c1,0,1.9,0.4,2.6,1.1C15.4,4.6,15.4,6.9,13.9,8.4z"/>
                                                    </svg>
                                                </button>
                                                <button class="product-card__action product-card__action--compare"
                                                        type="button" aria-label="Add to compare">
                                                    <svg width="16" height="16">
                                                        <path
                                                            d="M9,15H7c-0.6,0-1-0.4-1-1V2c0-0.6,0.4-1,1-1h2c0.6,0,1,0.4,1,1v12C10,14.6,9.6,15,9,15z"/>
                                                        <path
                                                            d="M1,9h2c0.6,0,1,0.4,1,1v4c0,0.6-0.4,1-1,1H1c-0.6,0-1-0.4-1-1v-4C0,9.4,0.4,9,1,9z"/>
                                                        <path
                                                            d="M15,5h-2c-0.6,0-1,0.4-1,1v8c0,0.6,0.4,1,1,1h2c0.6,0,1-0.4,1-1V6C16,5.4,15.6,5,15,5z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="product-card__image">
                                                <div class="image image--type--product">
                                                    <a href="product-full.html" class="image__body">
                                                        <img class="image__tag"
                                                             src="images/products/product-8-245x245.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div
                                                    class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                    <div class="status-badge__body">
                                                        <div class="status-badge__icon">
                                                            <svg width="13" height="13">
                                                                <path
                                                                    d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                            </svg>
                                                        </div>
                                                        <div class="status-badge__text">Part Fit for 2011 Ford Focus S
                                                        </div>
                                                        <div class="status-badge__tooltip" tabindex="0"
                                                             data-toggle="tooltip"
                                                             title="Part&#x20;Fit&#x20;for&#x20;2011&#x20;Ford&#x20;Focus&#x20;S"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__meta"><span class="product-card__meta-title">SKU:</span>
                                                    472-67382-Z
                                                </div>
                                                <div class="product-card__name">
                                                    <div>
                                                        <a href="product-full.html">Brandix Clutch Discs Z175</a>
                                                    </div>
                                                </div>
                                                <div class="product-card__rating">
                                                    <div class="rating product-card__rating-stars">
                                                        <div class="rating__body">
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star rating__star--active"></div>
                                                            <div class="rating__star"></div>
                                                            <div class="rating__star"></div>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__rating-label">3 on 7 reviews</div>
                                                </div>
                                            </div>
                                            <div class="product-card__footer">
                                                <div class="product-card__prices">
                                                    <div class="product-card__price product-card__price--current">
                                                        $345.00
                                                    </div>
                                                </div>
                                                <button class="product-card__addtocart-icon" type="button"
                                                        aria-label="Add to cart">
                                                    <svg width="20" height="20">
                                                        <circle cx="7" cy="17" r="2"/>
                                                        <circle cx="15" cy="17" r="2"/>
                                                        <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6
	V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4
	C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block-banners block">
            <div class="container">
                <div class="block-banners__list">
                    <a href="" class="block-banners__item block-banners__item--style--one">
                        <span class="block-banners__item-image"><img src="images/banners/banner1.jpg" alt=""></span>
                        <span class="block-banners__item-image block-banners__item-image--blur"><img
                                src="images/banners/banner1.jpg" alt=""></span>
                        <span class="block-banners__item-title">Motor Oils</span>
                        <span class="block-banners__item-details">
                                Synthetic motor oil with free shipping<br>
                                Friction free life guaranteed
                            </span>
                        <span class="block-banners__item-button btn btn-primary btn-sm">
                                Shop Now
                            </span>
                    </a>
                    <a href="" class="block-banners__item block-banners__item--style--two">
                        <span class="block-banners__item-image"><img src="images/banners/banner2.jpg" alt=""></span>
                        <span class="block-banners__item-image block-banners__item-image--blur"><img
                                src="images/banners/banner2.jpg" alt=""></span>
                        <span class="block-banners__item-title">Save up to $40</span>
                        <span class="block-banners__item-details">
                                Luxurious interior part for real aesthetes<br>
                                Leather, fabric, ivory and more.
                            </span>
                        <span class="block-banners__item-button btn btn-primary btn-sm">
                                Shop Now
                            </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-products-carousel" data-layout="horizontal">
            <div class="container">
                <div class="section-header">
                    <div class="section-header__body">
                        <h2 class="section-header__title">New Arrivals</h2>
                        <div class="section-header__spring"></div>
                        <ul class="section-header__links">
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">Wheel Covers</a>
                            </li>
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">Timing Belts</a>
                            </li>
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">Oil Pans</a>
                            </li>
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">Show All</a>
                            </li>
                        </ul>
                        <div class="section-header__arrows">
                            <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path
                                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="section-header__divider"></div>
                    </div>
                </div>
                <div class="block-products-carousel__carousel">
                    <div class="block-products-carousel__carousel-loader"></div>
                    <div class="owl-carousel">
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-1-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    <div class="tag-badge tag-badge--sale">sale</div>
                                                    <div class="tag-badge tag-badge--new">new</div>
                                                    <div class="tag-badge tag-badge--hot">hot</div>
                                                </div>
                                                <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 3 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$19.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-2-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">5 on 22 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$224.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-3-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    <div class="tag-badge tag-badge--sale">sale</div>
                                                </div>
                                                <a href="product-full.html">Left Headlight Of Brandix Z54</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">3 on 14 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--new">$349.00</div>
                                            <div class="product-card__price product-card__price--old">$415.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-4-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <div class="product-card__badges">
                                                    <div class="tag-badge tag-badge--hot">hot</div>
                                                </div>
                                                <a href="product-full.html">Glossy Gray 19" Aluminium Wheel AR-19</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 26 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$589.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-5-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 9 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$749.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-6-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Motor Oil Level 5</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">5 on 2 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$23.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-7-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Engine Block Z4</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">0 on 0 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$452.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-8-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Clutch Discs Z175</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">3 on 7 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$345.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-9-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Brandix Manual Five Speed Gearbox</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 6 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$879.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list">
                                        <button class="product-card__action product-card__action--quickview"
                                                type="button" aria-label="Quick view">
                                            <svg width="16" height="16">
                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z
	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="product-full.html" class="image__body">
                                                <img class="image__tag" src="images/products/product-10-245x245.jpg"
                                                     alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="product-full.html">Set of Car Floor Mats Brandix Z4</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body">
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star rating__star--active"></div>
                                                    <div class="rating__star"></div>
                                                </div>
                                            </div>
                                            <div class="product-card__rating-label">4 on 16 reviews</div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">$78.00</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        <div class="block block-posts-carousel block-posts-carousel--layout--grid" data-layout="grid">
            <div class="container">
                <div class="section-header">
                    <div class="section-header__body">
                        <h2 class="section-header__title">Latest News</h2>
                        <div class="section-header__spring"></div>
                        <ul class="section-header__links">
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">Special Offers</a>
                            </li>
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">New Arrivals</a>
                            </li>
                            <li class="section-header__links-item">
                                <a href="" class="section-header__links-link">Reviews</a>
                            </li>
                        </ul>
                        <div class="section-header__arrows">
                            <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path
                                            d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                    </svg>
                                </button>
                            </div>
                            <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                                <button class="arrow__button" type="button">
                                    <svg width="7" height="11">
                                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
	C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <div class="section-header__divider"></div>
                    </div>
                </div>
                <div class="block-posts-carousel__carousel">
                    <div class="owl-carousel">
                        <div class="block-posts-carousel__item">
                            <div class="post-card">
                                <div class="post-card__image">
                                    <a href="post-full-width.html">
                                        <img src="images/posts/post-1-730x485.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__content">
                                    <div class="post-card__category">
                                        <a href="blog-classic-right-sidebar.html">Special Offers</a>
                                    </div>
                                    <div class="post-card__title">
                                        <h2><a href="post-full-width.html">Philosophy That Addresses Topics Such As
                                                Goodness</a></h2>
                                    </div>
                                    <div class="post-card__date">
                                        By <a href="">Jessica Moore</a> on October 19, 2019
                                    </div>
                                    <div class="post-card__excerpt">
                                        <div class="typography">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis
                                            neque ut purus fermentum, ac pretium
                                            nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci
                                            non sapien ullamcorper dapibus.
                                            Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                                        </div>
                                    </div>
                                    <div class="post-card__more">
                                        <a href="post-full-width.html" class="btn btn-secondary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__item">
                            <div class="post-card">
                                <div class="post-card__image">
                                    <a href="post-full-width.html">
                                        <img src="images/posts/post-2-730x485.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__content">
                                    <div class="post-card__category">
                                        <a href="blog-classic-right-sidebar.html">Latest News</a>
                                    </div>
                                    <div class="post-card__title">
                                        <h2><a href="post-full-width.html">Logic Is The Study Of Reasoning And Argument
                                                Part 2</a></h2>
                                    </div>
                                    <div class="post-card__date">
                                        By <a href="">Jessica Moore</a> on September 5, 2019
                                    </div>
                                    <div class="post-card__excerpt">
                                        <div class="typography">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis
                                            neque ut purus fermentum, ac pretium
                                            nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci
                                            non sapien ullamcorper dapibus.
                                            Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                                        </div>
                                    </div>
                                    <div class="post-card__more">
                                        <a href="post-full-width.html" class="btn btn-secondary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__item">
                            <div class="post-card">
                                <div class="post-card__image">
                                    <a href="post-full-width.html">
                                        <img src="images/posts/post-3-730x485.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__content">
                                    <div class="post-card__category">
                                        <a href="blog-classic-right-sidebar.html">New Arrivals</a>
                                    </div>
                                    <div class="post-card__title">
                                        <h2><a href="post-full-width.html">Some Philosophers Specialize In One Or More
                                                Historical Periods</a></h2>
                                    </div>
                                    <div class="post-card__date">
                                        By <a href="">Jessica Moore</a> on August 12, 2019
                                    </div>
                                    <div class="post-card__excerpt">
                                        <div class="typography">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis
                                            neque ut purus fermentum, ac pretium
                                            nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci
                                            non sapien ullamcorper dapibus.
                                            Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                                        </div>
                                    </div>
                                    <div class="post-card__more">
                                        <a href="post-full-width.html" class="btn btn-secondary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__item">
                            <div class="post-card">
                                <div class="post-card__image">
                                    <a href="post-full-width.html">
                                        <img src="images/posts/post-4-730x485.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__content">
                                    <div class="post-card__category">
                                        <a href="blog-classic-right-sidebar.html">Special Offers</a>
                                    </div>
                                    <div class="post-card__title">
                                        <h2><a href="post-full-width.html">A Variety Of Other Academic And Non-Academic
                                                Approaches Have Been Explored</a></h2>
                                    </div>
                                    <div class="post-card__date">
                                        By <a href="">Jessica Moore</a> on Jule 30, 2019
                                    </div>
                                    <div class="post-card__excerpt">
                                        <div class="typography">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis
                                            neque ut purus fermentum, ac pretium
                                            nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci
                                            non sapien ullamcorper dapibus.
                                            Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                                        </div>
                                    </div>
                                    <div class="post-card__more">
                                        <a href="post-full-width.html" class="btn btn-secondary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__item">
                            <div class="post-card">
                                <div class="post-card__image">
                                    <a href="post-full-width.html">
                                        <img src="images/posts/post-5-730x485.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__content">
                                    <div class="post-card__category">
                                        <a href="blog-classic-right-sidebar.html">New Arrivals</a>
                                    </div>
                                    <div class="post-card__title">
                                        <h2><a href="post-full-width.html">Germany Was The First Country To
                                                Professionalize Philosophy</a></h2>
                                    </div>
                                    <div class="post-card__date">
                                        By <a href="">Jessica Moore</a> on June 12, 2019
                                    </div>
                                    <div class="post-card__excerpt">
                                        <div class="typography">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis
                                            neque ut purus fermentum, ac pretium
                                            nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci
                                            non sapien ullamcorper dapibus.
                                            Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                                        </div>
                                    </div>
                                    <div class="post-card__more">
                                        <a href="post-full-width.html" class="btn btn-secondary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-posts-carousel__item">
                            <div class="post-card">
                                <div class="post-card__image">
                                    <a href="post-full-width.html">
                                        <img src="images/posts/post-6-730x485.jpg" alt="">
                                    </a>
                                </div>
                                <div class="post-card__content">
                                    <div class="post-card__category">
                                        <a href="blog-classic-right-sidebar.html">Special Offers</a>
                                    </div>
                                    <div class="post-card__title">
                                        <h2><a href="post-full-width.html">Logic Is The Study Of Reasoning And Argument
                                                Part 1</a></h2>
                                    </div>
                                    <div class="post-card__date">
                                        By <a href="">Jessica Moore</a> on May 21, 2019
                                    </div>
                                    <div class="post-card__excerpt">
                                        <div class="typography">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec facilisis
                                            neque ut purus fermentum, ac pretium
                                            nibh facilisis. Vivamus venenatis viverra iaculis. Suspendisse tempor orci
                                            non sapien ullamcorper dapibus.
                                            Suspendisse at velit diam. Donec pharetra nec enim blandit vulputate.
                                        </div>
                                    </div>
                                    <div class="post-card__more">
                                        <a href="post-full-width.html" class="btn btn-secondary btn-sm">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>

        @include('frontend.home.partials.panel-brands', $brands)

{{--        <div class="block-space block-space--layout--divider-nl d-xl-block d-none"></div>--}}
{{--        <div class="block block-products-columns">--}}
{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-4">--}}
{{--                        <div class="block-products-columns__title">Top Rated Products</div>--}}
{{--                        <div class="block-products-columns__list">--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-1-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <div class="product-card__badges">--}}
{{--                                                    <div class="tag-badge tag-badge--sale">sale</div>--}}
{{--                                                    <div class="tag-badge tag-badge--new">new</div>--}}
{{--                                                    <div class="tag-badge tag-badge--hot">hot</div>--}}
{{--                                                </div>--}}
{{--                                                <a href="product-full.html">Brandix Spark Plug Kit ASR-400</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">4 on 3 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$19.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-2-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <a href="product-full.html">Brandix Brake Kit BDX-750Z370-S</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">5 on 22 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$224.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-3-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <div class="product-card__badges">--}}
{{--                                                    <div class="tag-badge tag-badge--sale">sale</div>--}}
{{--                                                </div>--}}
{{--                                                <a href="product-full.html">Left Headlight Of Brandix Z54</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">3 on 14 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--new">$349.00</div>--}}
{{--                                            <div class="product-card__price product-card__price--old">$415.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                        <div class="block-products-columns__title">Special Offers</div>--}}
{{--                        <div class="block-products-columns__list">--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-4-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <div class="product-card__badges">--}}
{{--                                                    <div class="tag-badge tag-badge--hot">hot</div>--}}
{{--                                                </div>--}}
{{--                                                <a href="product-full.html">Glossy Gray 19" Aluminium Wheel AR-19</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">4 on 26 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$589.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-5-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <a href="product-full.html">Twin Exhaust Pipe From Brandix Z54</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">4 on 9 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$749.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-6-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <a href="product-full.html">Motor Oil Level 5</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">5 on 2 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$23.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-4">--}}
{{--                        <div class="block-products-columns__title">Bestsellers</div>--}}
{{--                        <div class="block-products-columns__list">--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-7-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <a href="product-full.html">Brandix Engine Block Z4</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">0 on 0 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$452.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-8-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <a href="product-full.html">Brandix Clutch Discs Z175</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">3 on 7 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$345.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="block-products-columns__list-item">--}}
{{--                                <div class="product-card">--}}
{{--                                    <div class="product-card__actions-list">--}}
{{--                                        <button class="product-card__action product-card__action--quickview"--}}
{{--                                                type="button" aria-label="Quick view">--}}
{{--                                            <svg width="16" height="16">--}}
{{--                                                <path d="M14,15h-4v-2h3v-3h2v4C15,14.6,14.6,15,14,15z M13,3h-3V1h4c0.6,0,1,0.4,1,1v4h-2V3z M6,3H3v3H1V2c0-0.6,0.4-1,1-1h4V3z--}}
{{--	 M3,13h3v2H2c-0.6,0-1-0.4-1-1v-4h2V13z"/>--}}
{{--                                            </svg>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__image">--}}
{{--                                        <div class="image image--type--product">--}}
{{--                                            <a href="product-full.html" class="image__body">--}}
{{--                                                <img class="image__tag" src="images/products/product-9-245x245.jpg"--}}
{{--                                                     alt="">--}}
{{--                                            </a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__info">--}}
{{--                                        <div class="product-card__name">--}}
{{--                                            <div>--}}
{{--                                                <a href="product-full.html">Brandix Manual Five Speed Gearbox</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="product-card__rating">--}}
{{--                                            <div class="rating product-card__rating-stars">--}}
{{--                                                <div class="rating__body">--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star rating__star--active"></div>--}}
{{--                                                    <div class="rating__star"></div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="product-card__rating-label">4 on 6 reviews</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-card__footer">--}}
{{--                                        <div class="product-card__prices">--}}
{{--                                            <div class="product-card__price product-card__price--current">$879.00</div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            const formFinderSelector = '#form-finder';
            const manufacturerSelector = '#form-control-finder-manufacturer';
            const modelSelector = '#form-control-finder-model';
            const vehicleSelector = '#form-control-finder-vehicle';

            const manufacturerElement = $(manufacturerSelector);
            const modelElement = $(modelSelector);
            const vehicleElement = $(vehicleSelector);

            manufacturerElement.select2({width: ''});
            modelElement.select2({width: ''});
            vehicleElement.select2({width: ''});

            manufacturerElement.change(function () {
                const manufacturerId = parseInt($(this).val()) || 0;

                $.ajax({
                    url: 'api/models/' + manufacturerId,
                    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        deactivateSelect(modelSelector);
                        deactivateSelect(vehicleSelector);
                    },
                    success: function (response) {
                        activateSelect(modelSelector, response.data);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });

            modelElement.change(function () {
                const modelId = parseInt($(this).val()) || 0;

                $.ajax({
                    url: 'api/vehicles/' + modelId,
                    headers: {"X-CSRF-TOKEN": "{{ csrf_token() }}"},
                    method: 'GET',
                    dataType: 'json',
                    beforeSend: function() {
                        deactivateSelect(vehicleSelector);
                    },
                    success: function (response) {
                        activateSelect(vehicleSelector, response.data);
                    },
                    error: function (error) {
                        console.error(error);
                    }
                });
            });

            vehicleElement.change(function () {
                const vehicleId = parseInt($(this).val()) || 0;
            });

            $(formFinderSelector).submit(function(event) {
                event.preventDefault();
                window.location.href = '/auto/' + manufacturerElement.val() + '/' + modelElement.val() + '/' + vehicleElement.val();
            });
        });

        function deactivateSelect(selector) {
            $(selector).prop('disabled', true).val(0);
            $(selector + ' option').filter((index, option) => option.value > 0).remove();
        }

        function activateSelect(selector, data) {
            $(selector).prop('disabled', false).val(0);

            $.each(data, function (index, model) {
                $(selector).append($('<option>', {value: model.id, text: model.name}));
            });
        }
    </script>
@endsection

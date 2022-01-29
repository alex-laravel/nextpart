<div class="search__dropdown search__dropdown--vehicle-picker vehicle-picker">
    <div class="search__dropdown-arrow"></div>
    <div class="vehicle-picker__panel vehicle-picker__panel--list vehicle-picker__panel--active" data-panel="list">
        <div class="vehicle-picker__panel-body">
            <div class="vehicle-picker__text">
                {{ trans('strings.frontend.general.garage') }}
            </div>

            <div class="vehicles-list">
                <div class="vehicles-list__body m-0">
                @if (count(\App\Facades\Garage::getVehicles()))
                    @foreach (\App\Facades\Garage::getVehicles() as $garageVehicle)
                    <label class="vehicles-list__item">
                        <span class="vehicles-list__item-radio input-radio">
                            <span class="input-radio__body">
                                <input class="input-radio__input" name="header-vehicle" type="radio" {{ $garageVehicle['selected'] ? 'checked' : '' }}>
                                <span class="input-radio__circle"></span>
                            </span>
                        </span>
                                <span class="vehicles-list__item-info">
                            <span class="vehicles-list__item-name">
                                {{ $garageVehicle['manufacturerName'] }} / {{ $garageVehicle['manufacturerId'] }} -
                                {{ $garageVehicle['modelSeriesName'] }} / {{ $garageVehicle['modelSeriesId'] }}</span>
                            <span class="vehicles-list__item-details">
                                {{ trans('labels.frontend.account.garage.engine') }} {{ $garageVehicle['vehicleName'] }} / {{ $garageVehicle['vehicleId'] }}
                            </span>
                        </span>

                        <a href="{{ route('frontend.garage.vehicle.delete', [$garageVehicle['manufacturerId'], $garageVehicle['modelSeriesId'], $garageVehicle['vehicleId']]) }}" role="button" class="vehicles-list__item-remove">
                            <svg width="16" height="16">
                                <path d="M2,4V2h3V1h6v1h3v2H2z M13,13c0,1.1-0.9,2-2,2H5c-1.1,0-2-0.9-2-2V5h10V13z" />
                            </svg>
                        </a>
                    </label>
                    @endforeach
                @else
                    <small class="d-block py-3">{{ trans('labels.frontend.account.garage.no_auto') }}</small>
                @endif

{{--                        <a href="{{ route('frontend.garage.vehicle.activate', [$garageVehicle['manufacturerId'], $garageVehicle['modelSeriesId'], $garageVehicle['vehicleId']]) }}" class="badge bg-dark" style="width: 24px">A</a>--}}
{{--                        <a href="{{ route('frontend.garage.vehicle.delete', [$garageVehicle['manufacturerId'], $garageVehicle['modelSeriesId'], $garageVehicle['vehicleId']]) }}" class="badge bg-danger" style="width: 24px">D</a>--}}

                </div>
            </div>

            <div class="vehicle-picker__actions">
                <a href="{{ route('frontend.auto.index') }}" class="btn btn-sm btn-primary">
                    {{ trans('buttons.frontend.account.garage.add_vehicle') }}
                </a>

{{--                <button type="button" class="btn btn-primary btn-sm" data-to-panel="form">--}}
{{--                    {{ trans('buttons.frontend.account.garage.add_vehicle') }}--}}
{{--                </button>--}}
            </div>
        </div>
    </div>

{{--    <div class="vehicle-picker__panel vehicle-picker__panel--form" data-panel="form">--}}
{{--        <div class="vehicle-picker__panel-body">--}}
{{--            <div class="vehicle-form vehicle-form--layout--search">--}}
{{--                <div class="vehicle-form__item vehicle-form__item--select">--}}
{{--                    <select class="form-control form-control-select2" aria-label="Year">--}}
{{--                        <option value="none">Select Year</option>--}}
{{--                        <option>2010</option>--}}
{{--                        <option>2011</option>--}}
{{--                        <option>2012</option>--}}
{{--                        <option>2013</option>--}}
{{--                        <option>2014</option>--}}
{{--                        <option>2015</option>--}}
{{--                        <option>2016</option>--}}
{{--                        <option>2017</option>--}}
{{--                        <option>2018</option>--}}
{{--                        <option>2019</option>--}}
{{--                        <option>2020</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="vehicle-form__item vehicle-form__item--select">--}}
{{--                    <select class="form-control form-control-select2" aria-label="Brand" disabled>--}}
{{--                        <option value="none">Select Brand</option>--}}
{{--                        <option>Audi</option>--}}
{{--                        <option>BMW</option>--}}
{{--                        <option>Ferrari</option>--}}
{{--                        <option>Ford</option>--}}
{{--                        <option>KIA</option>--}}
{{--                        <option>Nissan</option>--}}
{{--                        <option>Tesla</option>--}}
{{--                        <option>Toyota</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="vehicle-form__item vehicle-form__item--select">--}}
{{--                    <select class="form-control form-control-select2" aria-label="Model" disabled>--}}
{{--                        <option value="none">Select Model</option>--}}
{{--                        <option>Explorer</option>--}}
{{--                        <option>Focus S</option>--}}
{{--                        <option>Fusion SE</option>--}}
{{--                        <option>Mustang</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="vehicle-form__item vehicle-form__item--select">--}}
{{--                    <select class="form-control form-control-select2" aria-label="Engine" disabled>--}}
{{--                        <option value="none">Select Engine</option>--}}
{{--                        <option>Gas 1.6L 125 hp AT/L4</option>--}}
{{--                        <option>Diesel 2.5L 200 hp AT/L5</option>--}}
{{--                        <option>Diesel 3.0L 250 hp MT/L5</option>--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                <div class="vehicle-form__divider">Or</div>--}}
{{--                <div class="vehicle-form__item">--}}
{{--                    <input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="vehicle-picker__actions">--}}
{{--                <div class="search__car-selector-link">--}}
{{--                    <a href="" data-to-panel="list">Back to vehicles list</a>--}}
{{--                </div>--}}
{{--                <button type="button" class="btn btn-primary btn-sm" disabled>Add A Vehicle</button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</div>

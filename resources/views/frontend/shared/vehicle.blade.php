@isset ($activeVehicle)
    <div class="block-split__row row no-gutters">
        <div class="card col-auto w-100 mb-3">
            <div class="card-body">
                <div class="vehicles-list">
                    <div class="vehicles-list__body">
                        <div class="vehicles-list__item">
                            <div class="vehicles-list__item-info">
                                <div class="vehicles-list__item-name">
                                    {{ $activeVehicle['manufacturerName'] }} {{ $activeVehicle['modelSeriesName'] }}
                                </div>

                                <div class="vehicles-list__item-details">
                                    {{ trans('labels.frontend.account.garage.engine') }}
                                    {{ $activeVehicle['vehicleName'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div id="add-vehicle-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="vehicle-picker-modal modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="vehicle-picker-modal__close"><svg width="12" height="12">
                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6
	c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4
	C11.2,9.8,11.2,10.4,10.8,10.8z" />
                </svg>
            </button>
            <div class="vehicle-picker-modal__panel vehicle-picker-modal__panel--active">
                <div class="vehicle-picker-modal__title card-title">Add A Vehicle</div>
                <div class="vehicle-form vehicle-form--layout--modal">
                    <div class="vehicle-form__item vehicle-form__item--select">
                        <select class="form-control form-control-select2" aria-label="Year">
                            <option value="none">Select Year</option>
                            <option>2010</option>
                            <option>2011</option>
                            <option>2012</option>
                            <option>2013</option>
                            <option>2014</option>
                            <option>2015</option>
                            <option>2016</option>
                            <option>2017</option>
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                        </select>
                    </div>
                    <div class="vehicle-form__item vehicle-form__item--select">
                        <select class="form-control form-control-select2" aria-label="Brand" disabled>
                            <option value="none">Select Brand</option>
                            <option>Audi</option>
                            <option>BMW</option>
                            <option>Ferrari</option>
                            <option>Ford</option>
                            <option>KIA</option>
                            <option>Nissan</option>
                            <option>Tesla</option>
                            <option>Toyota</option>
                        </select>
                    </div>
                    <div class="vehicle-form__item vehicle-form__item--select">
                        <select class="form-control form-control-select2" aria-label="Model" disabled>
                            <option value="none">Select Model</option>
                            <option>Explorer</option>
                            <option>Focus S</option>
                            <option>Fusion SE</option>
                            <option>Mustang</option>
                        </select>
                    </div>
                    <div class="vehicle-form__item vehicle-form__item--select">
                        <select class="form-control form-control-select2" aria-label="Engine" disabled>
                            <option value="none">Select Engine</option>
                            <option>Gas 1.6L 125 hp AT/L4</option>
                            <option>Diesel 2.5L 200 hp AT/L5</option>
                            <option>Diesel 3.0L 250 hp MT/L5</option>
                        </select>
                    </div>
                    <div class="vehicle-form__divider">Or</div>
                    <div class="vehicle-form__item">
                        <input type="text" class="form-control" placeholder="Enter VIN number" aria-label="VIN number">
                    </div>
                </div>
                <div class="vehicle-picker-modal__actions">
                    <button type="button" class="btn btn-sm btn-secondary vehicle-picker-modal__close-button">Cancel</button>
                    <button type="button" class="btn btn-sm btn-primary">Add A Vehicle</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="sidebar__backdrop"></div>
<div class="sidebar__body">
    <div class="sidebar__header">
        <div class="sidebar__title">{{ trans('labels.frontend.shop.filter.title') }}</div>

        <button class="sidebar__close" type="button">
            <svg width="12" height="12">
                <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6 c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4	C11.2,9.8,11.2,10.4,10.8,10.8z" />
            </svg>
        </button>
    </div>

    <div class="sidebar__content">
        <div class="widget widget-filters widget-filters--offcanvas--always" data-collapse data-collapse-opened-class="filter--opened">
            {{ Form::open(['url' => request()->url(), 'method' => 'GET']) }}

            <div class="widget__header widget-filters__header">
                <h4>{{ trans('labels.frontend.shop.filter.title') }}</h4>
            </div>

            <div class="widget-filters__list">
                @if(!empty($filterBrandVariants))
                <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>
                            {{ trans('labels.frontend.shop.filter.brand') }}
                            <span class="filter__arrow">
                                <svg width="12px" height="7px">
                                    <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg>
                            </span>
                        </button>

                        <div class="filter__body" data-collapse-content>
                            <div class="filter__container">
                                <div class="filter-list">
                                    <div class="filter-list__list">
                                        @foreach($filterBrandVariants as $filterBrandVariant)
                                        <label class="filter-list__item ">
                                            <span class="input-check filter-list__input">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox" name="filter_brand[]" value="{{ $filterBrandVariant->brandId }}" @if(in_array($filterBrandVariant->brandId, $filterBrandSelected)) checked @endif>
                                                    <span class="input-check__box"></span>
                                                    <span class="input-check__icon"><svg width="9px" height="7px">
                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>

                                            <span class="filter-list__title">
                                                {{ $filterBrandVariant->brandName }}
                                            </span>
{{--                                            <span class="filter-list__counter">42</span>--}}
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <div class="widget-filters__item">
                    <div class="filter filter--opened" data-collapse-item>
                        <button type="button" class="filter__title" data-collapse-trigger>
                            {{ trans('labels.frontend.shop.filter.price') }}
                            <span class="filter__arrow">
                                <svg width="12px" height="7px">
                                    <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z" />
                                </svg>
                            </span>
                        </button>

                        <div class="filter__body" data-collapse-content>
                            <div class="filter__container">
                                <div class="filter-price" data-min="1" data-max="50000" data-from="{{ $filterPriceMinSelected }}" data-to="{{ $filterPriceMaxSelected }}">
                                    <div class="filter-price__slider"></div>
                                    <div class="filter-price__title-button">
                                        <div class="filter-price__title">
                                            <span class="filter-price__min-value"></span>&nbsp;{{ trans('strings.general.hrn') }}
                                            –
                                            <span class="filter-price__max-value"></span>&nbsp;{{ trans('strings.general.hrn') }}
                                        </div>

                                        {{ Form::hidden('filter_price_min', 0, ['class' => 'filter-price-min']) }}
                                        {{ Form::hidden('filter_price_max', 0, ['class' => 'filter-price-max']) }}
                                        {{ Form::submit(Str::upper(trans('buttons.general.ok')), ['class' => 'btn btn-xs btn-secondary filter-price__button']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
{{--            <div class="widget-filters__actions d-flex">--}}
{{--                <button class="btn btn-primary btn-sm">Filter</button>--}}
{{--                <button class="btn btn-secondary btn-sm">Reset</button>--}}
{{--            </div>--}}

            {{ Form::close() }}
        </div>
    </div>
</div>

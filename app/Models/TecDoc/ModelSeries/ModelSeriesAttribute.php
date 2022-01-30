<?php


namespace App\Models\TecDoc\ModelSeries;


trait ModelSeriesAttribute
{
//<button class="btn btn-sm btn-info" type="submit">' . trans('buttons.general.synchronize_vehicles') . '</button>

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '<div class="btn-group">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . trans('buttons.general.synchronize') . '</button>
                    <div class="dropdown-menu">
                        ' . $this->getVehiclesSynchronizeButtonAttribute() . '
                        ' . $this->getVehicleDetailsSynchronizeButtonAttribute() . '
                        ' . $this->getVehicleAssetsSynchronizeButtonAttribute() . '
                    </div>';
    }

    /**
     * @return string
     */
    public function getVehiclesSynchronizeButtonAttribute()
    {
        return '<form class="d-inline" action="' . route('backend.models.vehicles.sync', $this->modelId) . '" method="post">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button class="dropdown-item" type="submit">' . trans('buttons.general.synchronize_vehicles') . '</button>
            </form>';
    }

    /**
     * @return string
     */
    public function getVehicleDetailsSynchronizeButtonAttribute()
    {
        return '<form class="d-inline" action="' . route('backend.models.vehicle-details.sync', $this->modelId) . '" method="post">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button class="dropdown-item" type="submit">' . trans('buttons.general.synchronize_vehicles_details') . '</button>
            </form>';
    }

    /**
     * @return string
     */
    public function getVehicleAssetsSynchronizeButtonAttribute()
    {
        return '<form class="d-inline" action="' . route('backend.models.vehicle-assets.sync', $this->modelId) . '" method="post">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button class="dropdown-item" type="submit">' . trans('buttons.general.synchronize_vehicles_assets') . '</button>
            </form>';
    }

//    /**
//     * @return string
//     */
//    public function getDirectArticlesSynchronizeButtonAttribute()
//    {
//        return '<form class="d-inline" action="' . route('backend.manufacturers.direct-articles.sync', $this->manuId) . '" method="post">
//            <input type="hidden" name="_token" value="' . csrf_token() . '">
//            <button class="btn btn-sm btn-primary" type="submit">SDA</button>
//            </form>';
//    }
//
//    /**
//     * @return string
//     */
//    public function getDirectArticlesDetailsSynchronizeButtonAttribute()
//    {
//        return '<form class="d-inline" action="' . route('backend.manufacturers.direct-article-details.sync', $this->manuId) . '" method="post">
//            <input type="hidden" name="_token" value="' . csrf_token() . '">
//            <button class="btn btn-sm btn-primary" type="submit">SDAD</button>
//            </form>';
//    }
//
//    /**
//     * @return string
//     */
//    public function getDirectArticlesAssetsSynchronizeButtonAttribute()
//    {
//        return '<form class="d-inline" action="' . route('backend.manufacturers.direct-article-assets.sync', $this->manuId) . '" method="post">
//            <input type="hidden" name="_token" value="' . csrf_token() . '">
//            <button class="btn btn-sm btn-primary" type="submit">SDAAS</button>
//            </form>';
//    }
//
//    /**
//     * @return string
//     */
//    public function getDirectArticlesAnalogsSynchronizeButtonAttribute()
//    {
//        return '<form class="d-inline" action="' . route('backend.manufacturers.direct-article-analogs.sync', $this->manuId) . '" method="post">
//            <input type="hidden" name="_token" value="' . csrf_token() . '">
//            <button class="btn btn-sm btn-primary" type="submit">SDAAN</button>
//            </form>';
//    }

    /**
     * @return string
     */
    public function getIsFavoriteLabelAttribute()
    {
        return $this->favorFlag
            ? '<span class="badge badge-info">F</span>'
            : '';
    }

    /**
     * @return string
     */
    public function getIsPopularLabelAttribute()
    {
        return $this->isPopular
            ? '<span class="badge badge-success">' . trans('labels.general.yes') . '</span>'
            : '<span class="badge badge-warning">' . trans('labels.general.no') . '</span>';
    }

    /**
     * @return string
     */
    public function getIsVisibleLabelAttribute()
    {
        return $this->isVisible
            ? '<span class="badge badge-success">' . trans('labels.general.yes') . '</span>'
            : '<span class="badge badge-warning">' . trans('labels.general.no') . '</span>';
    }
}

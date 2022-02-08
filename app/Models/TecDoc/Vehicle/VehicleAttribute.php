<?php


namespace App\Models\TecDoc\Vehicle;


trait VehicleAttribute
{
    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return $this->getShowButtonAttribute() .
            $this->getSynchronizeButtonsAttribute();
    }

    /**
     * @return string
     */
    private function getShowButtonAttribute()
    {
        return $this->details()->exists()
            ? '<a href="' . route('backend.vehicles.show', $this) . '" class="btn btn-sm btn-info"><i class="fas fa-info"></i></a> '
            : '';
    }

    /**
     * @return string
     */
    private function getSynchronizeButtonsAttribute()
    {
        return '<div class="btn-group">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . trans('buttons.general.synchronize') . '</button>
                    <div class="dropdown-menu">
                        ' . $this->getDirectArticlesSynchronizeButtonAttribute() . '
                        ' . $this->getDirectArticleDetailsSynchronizeButtonAttribute() . '
                    </div>';
    }

    /**
     * @return string
     */
    public function getDirectArticlesSynchronizeButtonAttribute()
    {
        return '<form class="d-inline" action="' . route('backend.vehicles.direct-articles.sync', $this->carId) . '" method="post">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button class="dropdown-item" type="submit">' . trans('buttons.general.synchronize_direct_articles') . '</button>
            </form>';
    }

    /**
     * @return string
     */
    public function getDirectArticleDetailsSynchronizeButtonAttribute()
    {
        return '<form class="d-inline" action="' . route('backend.vehicles.direct-article-details.sync', $this->carId) . '" method="post">
            <input type="hidden" name="_token" value="' . csrf_token() . '">
            <button class="dropdown-item" type="submit">' . trans('buttons.general.synchronize_direct_article_details') . '</button>
            </form>';
    }
}

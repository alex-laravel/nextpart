<?php


namespace App\Models\DistributorProduct;


trait DistributorProductAttribute
{
    /**
     * @return string
     */
    public function getHasTecDocArticleLabelAttribute()
    {
        return $this->has_tecdoc_article
            ? '<span class="badge badge-success">' . trans('labels.general.yes') . '</span>'
            : '<span class="badge badge-warning">' . trans('labels.general.no') . '</span>';
    }
}

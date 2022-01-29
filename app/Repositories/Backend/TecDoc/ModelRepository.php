<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\ModelSeries\ModelSeries;
use App\Repositories\BaseRepository;

class ModelRepository extends BaseRepository
{
    const MODEL = ModelSeries::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_model_series.*'
            ]);
    }
}

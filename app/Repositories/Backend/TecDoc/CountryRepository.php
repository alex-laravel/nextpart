<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\Country;
use App\Repositories\BaseRepository;

class CountryRepository extends BaseRepository
{
    const MODEL = Country::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_countries.*'
            ]);
    }
}

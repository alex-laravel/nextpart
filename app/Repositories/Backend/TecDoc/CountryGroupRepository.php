<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\CountryGroup;
use App\Repositories\BaseRepository;

class CountryGroupRepository extends BaseRepository
{
    const MODEL = CountryGroup::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_country_groups.*'
            ]);
    }
}

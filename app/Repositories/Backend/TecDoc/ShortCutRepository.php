<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\ShortCut\ShortCut;
use App\Repositories\BaseRepository;

class ShortCutRepository extends BaseRepository
{
    const MODEL = ShortCut::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_short_cuts.*'
            ]);
    }
}

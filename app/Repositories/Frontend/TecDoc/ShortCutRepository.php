<?php


namespace App\Repositories\Frontend\TecDoc;


use App\Models\TecDoc\ShortCut\ShortCut;
use App\Repositories\BaseRepository;

class ShortCutRepository extends BaseRepository
{
    /**
     * @param integer $shortCutId
     * @return ShortCut
     */
    public function getShortCutByShortCutId($shortCutId)
    {
        return ShortCut::where('shortCutId', (int)$shortCutId)->first();
    }
}

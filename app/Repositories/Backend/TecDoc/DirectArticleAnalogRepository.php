<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\DirectArticleAnalog\DirectArticleAnalog;
use App\Repositories\BaseRepository;

class DirectArticleAnalogRepository extends BaseRepository
{
    const MODEL = DirectArticleAnalog::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_direct_article_analogs.*'
            ]);
    }
}

<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\DirectArticleDetails\DirectArticleDetails;
use App\Repositories\BaseRepository;

class DirectArticleDetailsRepository extends BaseRepository
{
    const MODEL = DirectArticleDetails::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_direct_article_details.*'
            ]);
    }
}

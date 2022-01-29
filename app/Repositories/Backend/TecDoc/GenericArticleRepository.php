<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\GenericArticle\GenericArticle;
use App\Repositories\BaseRepository;

class GenericArticleRepository extends BaseRepository
{
    const MODEL = GenericArticle::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_generic_articles.*'
            ]);
    }
}

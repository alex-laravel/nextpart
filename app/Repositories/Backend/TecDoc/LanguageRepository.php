<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\Language;
use App\Repositories\BaseRepository;

class LanguageRepository extends BaseRepository
{
    const MODEL = Language::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_languages.*'
            ]);
    }
}

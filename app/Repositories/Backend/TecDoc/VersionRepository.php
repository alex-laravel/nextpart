<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\Version\Version;
use App\Repositories\BaseRepository;

class VersionRepository extends BaseRepository
{
    const MODEL = Version::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_version.*'
            ]);
    }
}

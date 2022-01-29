<?php


namespace App\Repositories\Backend\TecDoc;


use App\Models\TecDoc\AssemblyGroup\AssemblyGroup;
use App\Repositories\BaseRepository;

class AssemblyGroupRepository extends BaseRepository
{
    const MODEL = AssemblyGroup::class;

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'td_assembly_groups.*'
            ]);
    }
}

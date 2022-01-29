<?php


namespace App\Repositories\Backend\Distributors;


use App\Models\Distributor\Distributor;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class DistributorsRepository extends BaseRepository
{
    const MODEL = Distributor::class;

    /**
     * @param array $request
     * @return Distributor
     */
    public function create($request)
    {
        $distributor = self::MODEL;
        $distributor = new $distributor;
        $distributor->title = !empty($request['title']) ? $request['title'] : null;
        $distributor->description = !empty($request['description']) ? $request['description'] : null;
        $distributor->import_slug = Str::slug($distributor->title);
        $distributor->save();

        return $distributor;
    }

    /**
     * @param Distributor $distributor
     * @param array $request
     * @return Distributor
     */
    public function update(Distributor $distributor, $request)
    {
        $distributor->title = !empty($request['title']) ? $request['title'] : null;
        $distributor->description = !empty($request['description']) ? $request['description'] : null;
        $distributor->save();

        return $distributor;
    }

    /**
     * @param Distributor $distributor
     * @return boolean
     */
    public function delete(Distributor $distributor)
    {
        return $distributor->delete();
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->query()
            ->select([
                'sh_distributors.*'
            ]);
    }
}

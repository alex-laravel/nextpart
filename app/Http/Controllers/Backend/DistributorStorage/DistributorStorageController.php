<?php

namespace App\Http\Controllers\Backend\DistributorStorage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\DistributorStorage\DistributorStorageStoreRequest;
use App\Http\Requests\Backend\DistributorStorage\DistributorStorageUpdateRequest;
use App\Models\Distributor\Distributor;
use App\Models\DistributorStorage\DistributorStorage;
use App\Repositories\Backend\DistributorStorages\DistributorStoragesRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class DistributorStorageController extends Controller
{
    /**
     * @var DistributorStoragesRepository
     */
    protected $distributorStoragesRepository;

    /**
     * @param DistributorStoragesRepository $distributorStoragesRepository
     */
    public function __construct(DistributorStoragesRepository $distributorStoragesRepository)
    {
        $this->distributorStoragesRepository = $distributorStoragesRepository;
    }

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.distributor-storages.index');
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('backend.distributor-storages.create', [
            'distributorsList' => $this->prepareDistributorsList(),
            'deliveryDaysList' => $this->prepareDeliveryDaysList(),
        ]);
    }

    /**
     * @param DistributorStorageStoreRequest $request
     * @return View
     */
    public function store(DistributorStorageStoreRequest $request)
    {
        $this->distributorStoragesRepository->create($request->only([
            'distributor_id',
            'title',
            'description',
            'delivery_days',
            'import_sequence_number',
        ]));

        return view('backend.distributor-storages.index')->withFlashSuccess(trans('alerts.backend.distributor-storages.created'));
    }

    /**
     * @param DistributorStorage $distributorStorage
     * @return View
     */
    public function show(DistributorStorage $distributorStorage)
    {
        return view('backend.distributor-storages.show', [
            'distributorStorage' => $distributorStorage
        ]);
    }

    /**
     * @param DistributorStorage $distributorStorage
     * @return View
     */
    public function edit(DistributorStorage $distributorStorage)
    {
        return view('backend.distributor-storages.edit', [
            'distributorStorage' => $distributorStorage,
            'distributorsList' => $this->prepareDistributorsList(),
            'deliveryDaysList' => $this->prepareDeliveryDaysList(),
        ]);
    }

    /**
     * @param DistributorStorageUpdateRequest $request
     * @param DistributorStorage $distributorStorage
     * @return View
     */
    public function update(DistributorStorageUpdateRequest $request, DistributorStorage $distributorStorage)
    {
        $this->distributorStoragesRepository->update($distributorStorage, $request->only([
            'distributor_id',
            'title',
            'description',
            'delivery_days',
            'import_sequence_number',
        ]));

        return view('backend.distributor-storages.index')->withFlashSuccess(trans('alerts.backend.distributor-storages.updated'));
    }

    /**
     * @param DistributorStorage $distributorStorage
     * @return Response
     */
    public function destroy(DistributorStorage $distributorStorage)
    {
        $this->distributorStoragesRepository->delete($distributorStorage);

        return back()->withFlashSuccess(trans('alerts.backend.distributor-storages.deleted'));
    }

    /**
     * @return array
     */
    private function prepareDistributorsList()
    {
        $distributors = Distributor::pluck('title', 'id')->toArray();
        $distributors[0] = ' - Select One - ';

        asort($distributors);

        return $distributors;
    }

    /**
     * @return array
     */
    private function prepareDeliveryDaysList()
    {
        $deliveryDays = range(0, 31);
        $deliveryDays[0] = 'Today';

        return $deliveryDays;
    }
}

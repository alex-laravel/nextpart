<?php

namespace App\Http\Controllers\Backend\DistributorStorage;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\DistributorStorages\DistributorStoragesRepository;

class DistributorStorageAjaxController extends Controller
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
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->distributorStoragesRepository->getData())
            ->editColumn('delivery_days', function ($distributorStorage) {
                return $distributorStorage->delivery_days > 0 ? $distributorStorage->delivery_days : 0;
            })
            ->editColumn('import_sequence_number', function ($distributorStorage) {
                return $distributorStorage->import_sequence_number > 0 ? $distributorStorage->import_sequence_number : 0;
            })
            ->addColumn('distributor', function ($distributorStorage) {
                return $distributorStorage->distributor ? $distributorStorage->distributor->title : '';
            })
            ->addColumn('actions', function ($distributorStorage) {
                return $distributorStorage->actionButtons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

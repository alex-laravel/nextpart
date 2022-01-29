<?php

namespace App\Http\Controllers\Backend\Distributor;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\Distributors\DistributorsRepository;

class DistributorAjaxController extends Controller
{
    /**
     * @var DistributorsRepository
     */
    protected $distributorsRepository;

    /**
     * @param DistributorsRepository $distributorsRepository
     */
    public function __construct(DistributorsRepository $distributorsRepository)
    {
        $this->distributorsRepository = $distributorsRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->distributorsRepository->getData())
            ->addColumn('actions', function ($distributor) {
                return $distributor->actionButtons;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}

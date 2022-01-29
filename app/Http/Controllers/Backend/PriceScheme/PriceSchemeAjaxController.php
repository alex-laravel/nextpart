<?php

namespace App\Http\Controllers\Backend\PriceScheme;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\PriceSchemes\PriceSchemesRepository;

class PriceSchemeAjaxController extends Controller
{
    /**
     * @var PriceSchemesRepository
     */
    protected $priceSchemesRepository;

    /**
     * @param PriceSchemesRepository $priceSchemesRepository
     */
    public function __construct(PriceSchemesRepository $priceSchemesRepository)
    {
        $this->priceSchemesRepository = $priceSchemesRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->priceSchemesRepository->getData())
            ->editColumn('percentage', function ($priceScheme) {
                return $priceScheme->pricePercentLabel;
            })
            ->addColumn('actions', function ($priceScheme) {
                return $priceScheme->actionButtons;
            })
            ->rawColumns(['percentage', 'actions'])
            ->make(true);
    }
}

<?php

namespace App\Http\Controllers\Backend\DistributorProduct;

use App\Http\Controllers\Controller;
use App\Repositories\Backend\DistributorProducts\DistributorProductsRepository;

class DistributorProductAjaxController extends Controller
{
    /**
     * @var DistributorProductsRepository
     */
    protected $distributorProductsRepository;

    /**
     * @param DistributorProductsRepository $distributorProductsRepository
     */
    public function __construct(DistributorProductsRepository $distributorProductsRepository)
    {
        $this->distributorProductsRepository = $distributorProductsRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->distributorProductsRepository->getData())
            ->addColumn('distributor_storage', function ($distributorProduct) {
                return $distributorProduct->distributorStorage ? $distributorProduct->distributorStorage->title : '';
            })
            ->addColumn('retail_price', function ($distributorProduct) {
                return $distributorProduct->retail_price;
            })
            ->addColumn('percent', function ($distributorProduct) {
                $percentage = ($distributorProduct->price > 0 ? round(($distributorProduct->retail_price - $distributorProduct->price) * 100 / $distributorProduct->price) : 0);

                if ($percentage < 1) {
                    return '<label class="badge badge-danger">' . $percentage . '%</label>';
                }

                if ($percentage <= 25) {
                    return '<label class="badge badge-info">' . $percentage . '%</label>';
                }

                return '<label class="badge badge-success">' . $percentage . '%</label>';
            })
            ->addColumn('has_tecdoc_article', function ($distributorProduct) {
                return $distributorProduct->hasTecDocArticleLabel;
            })
            ->rawColumns(['percent', 'actions'])
            ->make(true);
    }
}

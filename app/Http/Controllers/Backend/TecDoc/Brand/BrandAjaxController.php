<?php


namespace App\Http\Controllers\Backend\TecDoc\Brand;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\BrandRepository;

class BrandAjaxController extends Controller
{
    /**
     * @var BrandRepository
     */
    protected $brandRepository;

    /**
     * @param BrandRepository $brandRepository
     */
    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->brandRepository->getData())->make(true);
    }
}

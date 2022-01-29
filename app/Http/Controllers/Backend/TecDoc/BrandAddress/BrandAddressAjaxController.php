<?php


namespace App\Http\Controllers\Backend\TecDoc\BrandAddress;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\BrandAddressRepository;

class BrandAddressAjaxController extends Controller
{
    /**
     * @var BrandAddressRepository
     */
    protected $brandAddressRepository;

    /**
     * @param BrandAddressRepository $brandAddressRepository
     */
    public function __construct(BrandAddressRepository $brandAddressRepository)
    {
        $this->brandAddressRepository = $brandAddressRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->brandAddressRepository->getData())->make(true);
    }
}

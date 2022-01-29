<?php


namespace App\Http\Controllers\Backend\TecDoc\CountryGroup;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\CountryGroupRepository;

class CountryGroupAjaxController extends Controller
{
    /**
     * @var CountryGroupRepository
     */
    protected $countryGroupRepository;

    /**
     * @param CountryGroupRepository $countryGroupRepository
     */
    public function __construct(CountryGroupRepository $countryGroupRepository)
    {
        $this->countryGroupRepository = $countryGroupRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->countryGroupRepository->getData())->make(true);
    }
}

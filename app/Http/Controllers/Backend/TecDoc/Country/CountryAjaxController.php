<?php


namespace App\Http\Controllers\Backend\TecDoc\Country;


use App\Http\Controllers\Controller;
use App\Repositories\Backend\TecDoc\CountryRepository;

class CountryAjaxController extends Controller
{
    /**
     * @var CountryRepository
     */
    protected $countryRepository;

    /**
     * @param CountryRepository $countryRepository
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function get()
    {
        return datatables()->of($this->countryRepository->getData())->make(true);
    }
}

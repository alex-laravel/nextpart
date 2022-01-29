<?php


namespace App\Http\Controllers\Frontend\Home;


use App\Http\Controllers\Frontend\FrontendController;
use App\Models\TecDoc\Brand;
use Illuminate\Contracts\View\View;

class HomeController extends FrontendController
{
    const BRANDS_LIMIT = 16;

    /**
     * @return View
     */
    public function index()
    {
        $manufacturers = $this->manufacturerRepository->getManufacturersOnlyIsVisible();

        $brands = Brand::inRandomOrder()->limit(self::BRANDS_LIMIT)->get();

        return view('frontend.home.index', [
            'manufacturers' => $manufacturers,
            'brands' => $brands,
        ]);
    }
}

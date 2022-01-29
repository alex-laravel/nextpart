<?php

namespace App\Http\Controllers\Backend\TecDoc\Brand;

use App\Http\Controllers\Controller;
use App\Models\TecDoc\Brand;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class BrandController extends Controller
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-brands.index');
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        Artisan::call('tecdoc:brands');

        $output = Artisan::output();
        $output = json_decode($output, true);

        if (!$this->hasSuccessResponse($output)) {
            \Log::alert('FAIL BRANDS RESPONSE!');
            return redirect()->back();
        }

        $output = $this->getResponseDataAsArray($output);

        if (empty($output)) {
            \Log::alert('EMPTY BRANDS RESPONSE!');
            return redirect()->back();
        }

        Brand::truncate();
        Brand::insert($output);

        \Log::info('BRANDS CREATED!');

        return redirect()->back();
    }

    /**
     * @return RedirectResponse
     */
    public function syncAssets()
    {
        ini_set('max_execution_time', 0);

        $brands = Brand::get();

        foreach ($brands as $brand) {
            Artisan::call('tecdoc:brand-assets', [
                'brandId' => $brand->id,
                'brandLogoId' => $brand->brandLogoID
            ]);

            $output = Artisan::output();
            $output === true
                ? \Log::info('BRANDS CREATED for Brand ID [' . $brand->brandId . ']!')
                : \Log::alert('FAIL BRAND ASSETS RESPONSE for Brand ID [' . $brand->brandId . ']!');
        }

        return redirect()->back();
    }
}

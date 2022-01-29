<?php


namespace App\Http\Controllers\Backend\TecDoc\Brand\Traits;


use App\Models\TecDoc\Brand\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait BrandAssetsSynchronize
{
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

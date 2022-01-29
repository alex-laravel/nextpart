<?php

namespace App\Http\Controllers\Backend\TecDoc\Brand\Traits;

use App\Models\TecDoc\Brand\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait BrandsSynchronize
{
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
}

<?php

namespace App\Http\Controllers\Backend\TecDoc\Brand;

use App\Http\Controllers\Backend\TecDoc\Brand\Traits\BrandAddressesSynchronize;
use App\Http\Controllers\Backend\TecDoc\Brand\Traits\BrandAssetsSynchronize;
use App\Http\Controllers\Backend\TecDoc\Brand\Traits\BrandsSynchronize;
use App\Http\Controllers\Controller;
use App\Models\TecDoc\Brand\Brand;
use App\Models\TecDoc\BrandAddress\BrandAddress;
use Illuminate\Contracts\View\View;

class BrandController extends Controller
{
    use BrandsSynchronize;
    use BrandAddressesSynchronize;
    use BrandAssetsSynchronize;

    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-brands.index');
    }

    /**
     * @param integer $brandAddressId
     * @return View
     */
    public function show($brandAddressId)
    {
        $brandAddress = BrandAddress::find($brandAddressId);
        $brand = Brand::find($brandAddress->brandId);

        return view('backend.tecdoc-brands.show', [
            'brand' => $brand,
            'brandAddress' => $brandAddress
        ]);
    }
}

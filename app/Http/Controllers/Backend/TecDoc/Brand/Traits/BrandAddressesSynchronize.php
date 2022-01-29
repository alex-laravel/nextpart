<?php

namespace App\Http\Controllers\Backend\TecDoc\Brand\Traits;

use App\Models\TecDoc\Brand\Brand;
use App\Models\TecDoc\BrandAddress\BrandAddress;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait BrandAddressesSynchronize
{
    /**
     * @return RedirectResponse
     */
    public function syncAddresses()
    {
        ini_set('max_execution_time', 0);

        BrandAddress::truncate();

        $brandIds = Brand::get()->pluck('brandId')->toArray();

        foreach ($brandIds as $brandId) {
            Artisan::call('tecdoc:brand-addresses', [
                'brandId' => $brandId
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::alert('FAIL BRAND ADDRESS RESPONSE FOR BRAND ID [' . $brandId . ']!');
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::alert('EMPTY BRAND ADDRESS RESPONSE FOR BRAND ID [' . $brandId . ']!');
                continue;
            }

            foreach ($output as &$brandAddress) {
                $brandAddress['brandId'] = $brandId;

                if (!isset($brandAddress['addressName'])) {
                    $brandAddress['addressName'] = null;
                }
                if (!isset($brandAddress['addressType'])) {
                    $brandAddress['addressType'] = null;
                }
                if (!isset($brandAddress['city'])) {
                    $brandAddress['city'] = null;
                }
                if (!isset($brandAddress['city2'])) {
                    $brandAddress['city2'] = null;
                }
                if (!isset($brandAddress['email'])) {
                    $brandAddress['email'] = null;
                }
                if (!isset($brandAddress['fax'])) {
                    $brandAddress['fax'] = null;
                }
                if (!isset($brandAddress['logoDocId'])) {
                    $brandAddress['logoDocId'] = null;
                }
                if (!isset($brandAddress['mailbox'])) {
                    $brandAddress['mailbox'] = null;
                }
                if (!isset($brandAddress['name'])) {
                    $brandAddress['name'] = null;
                }
                if (!isset($brandAddress['name2'])) {
                    $brandAddress['name2'] = null;
                }
                if (!isset($brandAddress['phone'])) {
                    $brandAddress['phone'] = null;
                }
                if (!isset($brandAddress['street'])) {
                    $brandAddress['street'] = null;
                }
                if (!isset($brandAddress['street2'])) {
                    $brandAddress['street2'] = null;
                }
                if (!isset($brandAddress['wwwURL'])) {
                    $brandAddress['wwwURL'] = null;
                }
                if (!isset($brandAddress['zip'])) {
                    $brandAddress['zip'] = null;
                }
                if (!isset($brandAddress['zipCountryCode'])) {
                    $brandAddress['zipCountryCode'] = null;
                }
                if (!isset($brandAddress['zipMailbox'])) {
                    $brandAddress['zipMailbox'] = null;
                }
                if (!isset($brandAddress['zipSpecial'])) {
                    $brandAddress['zipSpecial'] = null;
                }

                \Log::info('BRAND ADDRESS [' . $brandId . '] CREATED!');
            }

            BrandAddress::insert($output);
        }

        return redirect()->back();
    }
}

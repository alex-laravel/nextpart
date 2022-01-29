<?php

namespace App\Http\Controllers\Backend\TecDoc\ShortCut;

use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Models\TecDoc\ShortCut\ShortCut;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class ShortCutController extends TecDocController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-short-cuts.index');
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        ShortCut::truncate();

        foreach (self::$allowedShortCutsLinkingTargetTypes as $linkingTargetType) {
            Artisan::call('tecdoc:short-cuts', [
                'linkingTargetType' => $linkingTargetType
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::alert('FAIL SHORT CUTS RESPONSE FOR linkingTargetType [' . $linkingTargetType . ']!');
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::alert('EMPTY SHORT CUTS RESPONSE FOR linkingTargetType [' . $linkingTargetType . ']!');
                continue;
            }

            foreach ($output as &$shortCut) {
                $shortCut['linkingTargetType'] = $linkingTargetType;
            }

            ShortCut::insert($output);
        }

        return redirect()->back();
    }
}

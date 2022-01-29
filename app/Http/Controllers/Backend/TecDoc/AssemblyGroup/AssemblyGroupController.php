<?php

namespace App\Http\Controllers\Backend\TecDoc\AssemblyGroup;

use App\Http\Controllers\Backend\TecDoc\TecDocController;
use App\Models\TecDoc\AssemblyGroup\AssemblyGroup;
use App\Models\TecDoc\ShortCut\ShortCut;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

class AssemblyGroupController extends TecDocController
{
    /**
     * @return View
     */
    public function index()
    {
        return view('backend.tecdoc-assembly-groups.index');
    }

    /**
     * @return RedirectResponse
     */
    public function sync()
    {
        AssemblyGroup::truncate();

        $shortCuts = ShortCut::orderBy('shortCutId')->get();

        foreach ($shortCuts as $shortCut) {
            Artisan::call('tecdoc:assembly-groups', [
                'linkingTargetType' => $shortCut->linkingTargetType,
                'shortCutId' => $shortCut->shortCutId,
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::alert('FAIL ASSEMBLY GROUPS RESPONSE FOR shortCutId [' . $shortCut->shortCutId . '] AND linkingTargetType [' . $shortCut->linkingTargetType . ']!');
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::alert('EMPTY ASSEMBLY GROUPS RESPONSE FOR shortCutId [' . $shortCut->shortCutId . '] AND linkingTargetType [' . $shortCut->linkingTargetType . ']!');
                continue;
            }

            foreach ($output as $index => &$assemblyGroup) {
                $assemblyGroup['shortCutId'] = $shortCut->shortCutId;
                $assemblyGroup['shortCutName'] = $shortCut->shortCutName;
                $assemblyGroup['linkingTargetType'] = $shortCut->linkingTargetType;
                $assemblyGroup['parentNodeId'] = isset($assemblyGroup['parentNodeId']) ? $assemblyGroup['parentNodeId'] : null;
            }

            AssemblyGroup::insert($output);
        }

        return redirect()->back();
    }
}

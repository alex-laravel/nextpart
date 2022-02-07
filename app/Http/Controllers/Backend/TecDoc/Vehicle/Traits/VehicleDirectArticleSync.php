<?php

namespace App\Http\Controllers\Backend\TecDoc\Vehicle\Traits;

use App\Jobs\TecDoc\DirectArticleJob;
use App\Models\TecDoc\AssemblyGroup\AssemblyGroup;
use App\Models\TecDoc\Vehicle\Vehicle;
use Illuminate\Http\RedirectResponse;

trait VehicleDirectArticleSync
{
    /**
     * @param integer $vehicleId
     * @return RedirectResponse
     */
    public function syncDirectArticles($vehicleId)
    {
        ini_set('max_execution_time', 0);

        $vehicle = Vehicle::where('carId', (int)$vehicleId)->first();
        $vehicleType = $vehicle->carType === 'P' ? 'V' : $vehicle->carType;

        $assemblyGroups = AssemblyGroup::where('linkingTargetType', $vehicleType)->onlyIsFinal()->orderBy('assemblyGroupNodeId')->get();

        $assemblyGroupsUnique = [];

        foreach ($assemblyGroups as $assemblyGroup) {
            $assemblyGroupsUnique[$assemblyGroup->assemblyGroupNodeId] = $assemblyGroup;
        }

        foreach ($assemblyGroupsUnique as $assemblyGroupUnique) {
            DirectArticleJob::dispatch($vehicle->carId, $assemblyGroupUnique->linkingTargetType, $assemblyGroupUnique->assemblyGroupNodeId);

            \Log::debug('PUSHED DIRECT ARTICLE JOB FOR VEHICLE ID [' . $vehicle->carId . '] AND ASSEMBLY ID [' . $assemblyGroupUnique->assemblyGroupNodeId . '].');
            \Log::debug($vehicle->carId . ' | ' . $assemblyGroupUnique->linkingTargetType . ' | ' . $assemblyGroupUnique->assemblyGroupNodeId);
        }

        return redirect()->back();
    }
}

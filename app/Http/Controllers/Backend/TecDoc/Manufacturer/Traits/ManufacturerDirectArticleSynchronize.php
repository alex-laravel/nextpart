<?php


namespace App\Http\Controllers\Backend\TecDoc\Manufacturer\Traits;


use App\Models\TecDoc\AssemblyGroup\AssemblyGroup;
use App\Models\TecDoc\DirectArticle\DirectArticle;
use App\Models\TecDoc\Vehicle\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

trait ManufacturerDirectArticleSynchronize
{
    /**
     * @param integer $manufacturerId
     * @return RedirectResponse
     */
    public function syncDirectArticles($manufacturerId)
    {
        ini_set('max_execution_time', 0);

        $manufacturerId = (int)$manufacturerId;

        DirectArticle::truncate();

        $vehicles = Vehicle::where('manuId', $manufacturerId)->get();
        $assemblyGroups = AssemblyGroup::where('hasChilds', false)->orderBy('assemblyGroupNodeId')->get();

        $assemblyGroupsUnique = [];

        foreach ($assemblyGroups as $assemblyGroup) {
            $assemblyGroupsUnique[$assemblyGroup->assemblyGroupNodeId] = $assemblyGroup;
        }

        foreach ($vehicles as $vehicle) {
            foreach ($assemblyGroupsUnique as $assemblyGroupUnique) {
                if ($vehicle->carType === 'P') {
                    $vehicle->carType = 'V';
                }

                if ($vehicle->carType !== $assemblyGroupUnique->linkingTargetType) {
                    continue;
                }

                Artisan::call('tecdoc:direct-articles', [
                    'linkingTargetId' => $vehicle->carId,
                    'linkingTargetType' => $assemblyGroupUnique->linkingTargetType,
                    'assemblyGroupId' => $assemblyGroupUnique->assemblyGroupNodeId,
                ]);

                $output = Artisan::output();
                $output = json_decode($output, true);

                if (!$this->hasSuccessResponse($output)) {
                    \Log::alert('FAIL DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                    \Log::alert($output);
                    continue;
                }

                $output = $this->getResponseDataAsArray($output);

                if (empty($output)) {
                    \Log::alert('EMPTY DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                    continue;
                }

                foreach ($output as &$article) {
                    $article['carId'] = $vehicle->carId;
                    $article['assemblyGroupNodeId'] = $assemblyGroupUnique->assemblyGroupNodeId;
                    $article['linkingTargetType'] = $assemblyGroupUnique->linkingTargetType;
                }

                DirectArticle::insert($output);

                \Log::info('DIRECT ARTICLES FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . '] CREATED!');
            }
        }

        return redirect()->back();
    }
}

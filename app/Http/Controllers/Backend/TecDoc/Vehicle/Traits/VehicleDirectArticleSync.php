<?php

namespace App\Http\Controllers\Backend\TecDoc\Vehicle\Traits;

use App\Jobs\TecDoc\DirectArticleJob;
use App\Models\TecDoc\AssemblyGroup\AssemblyGroup;
use App\Models\TecDoc\DirectArticle\DirectArticle;
use App\Models\TecDoc\DirectArticleRegistry\DirectArticleRegistry;
use App\Models\TecDoc\Vehicle\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Artisan;

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
//            DirectArticleJob::dispatch($vehicle->carId, $assemblyGroupUnique->linkingTargetType, $assemblyGroupUnique->assemblyGroupNodeId);
//            \Log::debug('PUSHED DIRECT ARTICLE JOB FOR VEHICLE ID [' . $vehicle->carId . '] AND ASSEMBLY ID [' . $assemblyGroupUnique->assemblyGroupNodeId . '].');
//            \Log::debug($vehicle->carId . ' | ' . $assemblyGroupUnique->linkingTargetType . ' | ' . $assemblyGroupUnique->assemblyGroupNodeId);

            Artisan::call('tecdoc:direct-articles', [
                'linkingTargetId' => $vehicle->carId,
                'linkingTargetType' => $assemblyGroupUnique->linkingTargetType,
                'assemblyGroupId' => $assemblyGroupUnique->assemblyGroupNodeId,
            ]);

            $output = Artisan::output();
            $output = json_decode($output, true);

            if (!$this->hasSuccessResponse($output)) {
                \Log::debug('FAIL DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                \Log::debug($output);
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                \Log::debug('EMPTY DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                continue;
            }

            foreach ($output as &$article) {
                $article['carId'] = $vehicle->carId;
                $article['linkingTargetType'] = $assemblyGroupUnique->linkingTargetType;
                $article['assemblyGroupNodeId'] = $assemblyGroupUnique->assemblyGroupNodeId;
            }

            DirectArticle::insert($output);

            \Log::debug('DIRECT ARTICLES FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . '] CREATED!');
        }

        unset($assemblyGroups);
        unset($assemblyGroupsUnique);

        \Log::debug('DIRECT ARTICLES REGISTRY PROCESS STARTED!');

        $directArticlesUnique = DirectArticle::distinct()->get(['articleId']);

        foreach ($directArticlesUnique as $directArticleUnique) {
            if (!DirectArticleRegistry::where('articleId', $directArticleUnique->articleId)->exists()) {
                DirectArticleRegistry::create(['articleId' => $directArticleUnique->articleId]);
                \Log::debug('DIRECT ARTICLES REGISTRY PROCESS: added article ID [' . $directArticleUnique->articleId . ']!');
            }
        }

        unset($directArticlesUnique);

        \Log::debug('DIRECT ARTICLES REGISTRY PROCESS FINISHED!');

        return redirect()->back();
    }
}

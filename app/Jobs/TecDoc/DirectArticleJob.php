<?php

namespace App\Jobs\TecDoc;

use App\Models\TecDoc\AssemblyGroup\AssemblyGroup;
use App\Models\TecDoc\DirectArticle\DirectArticle;
use App\Models\TecDoc\Vehicle\Vehicle;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;

class DirectArticleJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var integer
     */
    public $timeout = 259200;

    /**
     * @var integer
     */
    private $vehicleId;

    /**
     *
     * @param integer $vehicleId
     * @return void
     */
    public function __construct($vehicleId)
    {
        $this->vehicleId = $vehicleId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);

        \Log::debug('===========================================================================');
        \Log::debug('STARTED QUEUE FOR VEHICLE ID [' . $this->vehicleId . ']');
        \Log::debug('===========================================================================');

        $assemblyGroups = AssemblyGroup::where('hasChilds', false)->orderBy('assemblyGroupNodeId')->get();

        $assemblyGroupsUnique = [];
        $directArticlesCollection = [];

        foreach ($assemblyGroups as $assemblyGroup) {
            $assemblyGroupsUnique[$assemblyGroup->assemblyGroupNodeId] = $assemblyGroup;
        }

        $vehicle = Vehicle::find($this->vehicleId);

        $this->markVehicleAsSynchronized($vehicle);

        foreach ($assemblyGroupsUnique as $assemblyGroupUnique) {
            if ($vehicle->carType === 'P') {
                $vehicle->carType = 'V';
            }

            if ($vehicle->carType !== $assemblyGroupUnique->linkingTargetType) {
                continue;
            }

//            Artisan::call('tecdoc:direct-articles', [
//                'linkingTargetId' => $vehicle->carId,
//                'linkingTargetType' => $assemblyGroupUnique->linkingTargetType,
//                'assemblyGroupId' => $assemblyGroupUnique->assemblyGroupNodeId,
//            ]);
//
//            $output = Artisan::output();

            try {
                $output = $this->callDirectArticlesApi($vehicle->carId, $assemblyGroupUnique->linkingTargetType, $assemblyGroupUnique->assemblyGroupNodeId);
                $output = json_decode($output, true);
            } catch (\Exception $exception) {
                \Log::debug('==================================================================================================================================================================================================================================');
                \Log::debug('CATCH EXCEPTION 1 DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                \Log::debug('==================================================================================================================================================================================================================================');

                try {
                    sleep(1);
                    $output = $this->callDirectArticlesApi($vehicle->carId, $assemblyGroupUnique->linkingTargetType, $assemblyGroupUnique->assemblyGroupNodeId);
                    $output = json_decode($output, true);
                } catch (\Exception $exception) {
                    \Log::debug('==================================================================================================================================================================================================================================');
                    \Log::debug('CATCH EXCEPTION 2 DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                    \Log::debug('==================================================================================================================================================================================================================================');

                    try {
                        sleep(1);
                        $output = $this->callDirectArticlesApi($vehicle->carId, $assemblyGroupUnique->linkingTargetType, $assemblyGroupUnique->assemblyGroupNodeId);
                        $output = json_decode($output, true);
                    } catch (\Exception $exception) {
                        \Log::debug('==================================================================================================================================================================================================================================');
                        \Log::debug('CATCH EXCEPTION 3 DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                        \Log::debug('==================================================================================================================================================================================================================================');

                        throw $exception;
                    }
                }
            }


            if (!$this->hasSuccessResponse($output)) {
                \Log::debug('FAIL DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . ']!');
                \Log::debug($output);
                continue;
            }

            $output = $this->getResponseDataAsArray($output);

            if (empty($output)) {
                continue;
            }

            foreach ($output as &$article) {
                $article['carId'] = $vehicle->carId;
                $article['assemblyGroupNodeId'] = $assemblyGroupUnique->assemblyGroupNodeId;
                $article['linkingTargetType'] = $assemblyGroupUnique->linkingTargetType;

                $directArticlesCollection[] = $article;

            }

            \Log::info('DIRECT ARTICLES FOR linkingTargetId [' . $vehicle->carId . '] AND linkingTargetType [' . $assemblyGroupUnique->linkingTargetType . '] AND assemblyGroupId [' . $assemblyGroupUnique->assemblyGroupNodeId . '] CREATED!');

            if (count($directArticlesCollection) > 500) {
                DirectArticle::insert($directArticlesCollection);
                $directArticlesCollection = [];
            }
        }

        if (count($directArticlesCollection) > 0) {
            DirectArticle::insert($directArticlesCollection);
            $directArticlesCollection = [];
        }

        $this->markVehicleAsSynchronized($vehicle, now());

        unset($assemblyGroups);
        unset($assemblyGroupsUnique);
        unset($vehicle);
        unset($directArticlesCollection);

        \Log::debug('===========================================================================');
        \Log::debug('FINISHED QUEUE FOR VEHICLE ID [' . $this->vehicleId . ']');
        \Log::debug('===========================================================================');
    }

    /**
     * @param Vehicle $vehicle
     * @param \DateTime $date
     */
    private function markVehicleAsSynchronized($vehicle, $date = null)
    {
        $vehicle->synchronizedArticlesAt = $date;
        $vehicle->save();
    }

    /**
     * @param array $response
     * @return bool
     */
    protected function hasSuccessResponse($response)
    {
        return $this->hasSuccessStatus($response) && $this->hasData($response);
    }

    /**
     * @param array $response
     * @return bool
     */
    protected function hasSuccessStatus($response)
    {
        return is_array($response) && array_key_exists('status', $response) && $response['status'] === 200;
    }

    /**
     * @param array $response
     * @return bool
     */
    protected function hasData($response)
    {
        return is_array($response) && array_key_exists('data', $response);
    }

    /**
     * @param array $response
     * @return array
     */
    protected function getResponseDataAsArray($response)
    {
        return is_array($response['data']) && array_key_exists('array', $response['data']) ? $response['data']['array'] : [];
    }

    private function callDirectArticlesApi($carId, $linkingTargetType, $assemblyGroupNodeId)
    {
        Artisan::call('tecdoc:direct-articles', [
            'linkingTargetId' => $carId,
            'linkingTargetType' => $linkingTargetType,
            'assemblyGroupId' => $assemblyGroupNodeId,
        ]);

        return Artisan::output();
    }
}

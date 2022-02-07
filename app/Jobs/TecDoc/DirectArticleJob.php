<?php

namespace App\Jobs\TecDoc;

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
     * @var string
     */
    private $vehicleType;

    /**
     * @var integer
     */
    private $assemblyGroupId;

    /**
     *
     * @param integer $vehicleId
     * @param string $vehicleType
     * @param integer $assemblyGroupId
     * @return void
     */
    public function __construct($vehicleId, $vehicleType, $assemblyGroupId)
    {
        $this->vehicleId = (int)$vehicleId;
        $this->vehicleType = $vehicleType;
        $this->assemblyGroupId = (int)$assemblyGroupId;
    }

    /**
     * @return boolean
     * @throws \Exception
     */
    public function handle()
    {
        ini_set('max_execution_time', 0);

        \Log::debug('===========================================================================');
        \Log::debug('STARTED QUEUE FOR VEHICLE ID [' . $this->vehicleId . '] AND VEHICLE TYPE [' . $this->vehicleType . '] AND ASSEMBLY ID [' . $this->assemblyGroupId . ']');
        \Log::debug('===========================================================================');

        try {
            $output = $this->callDirectArticlesApi();
            $output = json_decode($output, true);
        } catch (\Exception $exception) {
            \Log::debug('==================================================================================================================================================================================================================================');
            \Log::debug('CATCH EXCEPTION 1 DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $this->vehicleId . '] AND linkingTargetType [' . $this->vehicleType . '] AND assemblyGroupId [' . $this->assemblyGroupId . ']!');
            \Log::debug('==================================================================================================================================================================================================================================');

            try {
                sleep(1);
                $output = $this->callDirectArticlesApi();
                $output = json_decode($output, true);
            } catch (\Exception $exception) {
                \Log::debug('==================================================================================================================================================================================================================================');
                \Log::debug('CATCH EXCEPTION 2 DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $this->vehicleId . '] AND linkingTargetType [' . $this->vehicleType . '] AND assemblyGroupId [' . $this->assemblyGroupId . ']!');
                \Log::debug('==================================================================================================================================================================================================================================');

                try {
                    sleep(1);
                    $output = $this->callDirectArticlesApi();
                    $output = json_decode($output, true);
                } catch (\Exception $exception) {
                    \Log::debug('==================================================================================================================================================================================================================================');
                    \Log::debug('CATCH EXCEPTION 3 DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $this->vehicleId . '] AND linkingTargetType [' . $this->vehicleType . '] AND assemblyGroupId [' . $this->assemblyGroupId . ']!');
                    \Log::debug('==================================================================================================================================================================================================================================');

                    throw $exception;
                }
            }
        }

        if (!$this->hasSuccessResponse($output)) {
            \Log::debug('FAIL DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $this->vehicleId . '] AND linkingTargetType [' . $this->vehicleType . '] AND assemblyGroupId [' . $this->assemblyGroupId . ']!');
            \Log::debug($output);
            throw new \Exception(json_encode($output));
        }

        $output = $this->getResponseDataAsArray($output);

        if (empty($output)) {
            \Log::debug('EMPTY DIRECT ARTICLES RESPONSE FOR linkingTargetId [' . $this->vehicleId . '] AND linkingTargetType [' . $this->vehicleType . '] AND assemblyGroupId [' . $this->assemblyGroupId . ']!');
            return false;
        }

        foreach ($output as &$article) {
            $article['carId'] = $this->vehicleId;
            $article['linkingTargetType'] = $this->vehicleType;
            $article['assemblyGroupNodeId'] = $this->assemblyGroupId;
        }

        DirectArticle::insert($output);

        \Log::info('DIRECT ARTICLES FOR linkingTargetId [' . $this->vehicleId . '] AND linkingTargetType [' . $this->vehicleType . '] AND assemblyGroupId [' . $this->assemblyGroupId . '] CREATED!');

        \Log::debug('===========================================================================');
        \Log::debug('FINISHED QUEUE FOR VEHICLE ID [' . $this->vehicleId . ']');
        \Log::debug('===========================================================================');

        return true;
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

    /**
     * @return string
     */
    private function callDirectArticlesApi()
    {
        Artisan::call('tecdoc:direct-articles', [
            'linkingTargetId' => $this->vehicleId,
            'linkingTargetType' => $this->vehicleType,
            'assemblyGroupId' => $this->assemblyGroupId,
        ]);

        return Artisan::output();
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocVehiclesCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:vehicles {manufacturerId} {modelId} {linkingTargetType} {country} {countryGroup}';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Vehicles';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function handle()
    {
        $manufacturerId = (int)$this->argument('manufacturerId');
        $modelId = (int)$this->argument('modelId');
        $country = $this->argument('country');
        $countryGroup = $this->argument('countryGroup');
        $linkingTargetType = $this->argument('linkingTargetType');

        $countryGroupFlag = !empty($countryGroup);

        \Log::debug('CALL COMMAND [tecdoc:models] [' . $manufacturerId . '] [' . $modelId . '] [' . $country . '] [' . $countryGroup . '] [' . $linkingTargetType . ']');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getVehicleIdsByCriteria' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'countriesCarSelection' => $countryGroupFlag ? $countryGroup : $country,
                'countryGroupFlag' => $countryGroupFlag,
                'carType' => $linkingTargetType,
                'manuId' => $manufacturerId,
                'modId' => $modelId,
                'favouredList' => null
            ]
        ]);

        $this->line($response->body());
    }
}

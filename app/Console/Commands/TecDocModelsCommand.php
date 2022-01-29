<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocModelsCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:models {manufacturerId} {linkingTargetType} {country} {countryGroup}';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Models';

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * getModelSeries():
     * Correct linking target type:
     * linkingTargetType=P -> passenger cars
     * linkingTargetType=O -> commercial vehicles
     * linkingTargetType=PO -> both passenger cars and commercial vehicles
     *
     * Favor handling:
     * favouredList=NULL -> all vehicles
     * favouredList=1 -> favorites only
     * favouredList=0 -> Rest
     *
     * @return void
     */
    public function handle()
    {
        $manufacturerId = (int)$this->argument('manufacturerId');
        $country = $this->argument('country');
        $countryGroup = $this->argument('countryGroup');
        $linkingTargetType = $this->argument('linkingTargetType');

        $countryGroupFlag = !empty($countryGroup);

        \Log::debug('CALL COMMAND [tecdoc:models] [' . $manufacturerId . '] [' . $country . '] [' . $countryGroup . '] [' . $linkingTargetType . ']');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getModelSeries2' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'country' => $countryGroupFlag ? $countryGroup : $country,
                'countryGroupFlag' => $countryGroupFlag,
                'linkingTargetType' => $linkingTargetType,
                'manuId' => $manufacturerId,
            ]
        ]);

        $this->line($response->body());
    }
}

<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocVehicleDetailsCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:vehicle-details {vehicleIds*}';

    /**
     * @var string
     */
    protected $description = 'Generate TecDoc Vehicle Details';

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
        $vehicleIds = $this->argument('vehicleIds');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getVehicleByIds4' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'country' => config('tecdoc.api.country'),
                'countriesCarSelection' => config('tecdoc.api.country'),
                'articleCountry' => config('tecdoc.api.country'),
                'carIds' => [
                    'array' => $vehicleIds
                ],
            ]
        ]);

        $this->line($response->body());
    }
}

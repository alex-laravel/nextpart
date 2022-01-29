<?php

namespace App\Console\Commands\DeliveryNovaPoshta;

use Illuminate\Support\Facades\Http;

class DeliveryNovaPoshtaWarehousesCommand extends DeliveryNovaPoshtaCommand
{
    /**
     * @var string
     */
    protected $signature = 'novaposhta:warehouses {cityRef}';

    /**
     * @var string
     */
    protected $description = 'Nova Poshta warehouses synchronization';

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
        \Log::debug('CALL COMMAND [novaposhta:warehouses]');

        $cityRef = $this->argument('cityRef');

        $response = Http::timeout($this->httpResponseTimeout)
            ->retry($this->httpRetryMaxTime, $this->httpRetryDelay)
            ->withHeaders($this->httpHeaders)
            ->post($this->baseUri . $this->format . '/AddressGeneral/getWarehouses', [
                'modelName' => 'AddressGeneral',
                'calledMethod' => 'getWarehouses',
                'methodProperties' => [
                    'CityRef' => $cityRef
                ]
            ]);

        $this->line($response->body());
    }
}

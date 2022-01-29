<?php

namespace App\Console\Commands\DeliveryNovaPoshta;

use Illuminate\Support\Facades\Http;

class DeliveryNovaPoshtaRegionsCommand extends DeliveryNovaPoshtaCommand
{
    /**
     * @var string
     */
    protected $signature = 'novaposhta:regions';

    /**
     * @var string
     */
    protected $description = 'Nova Poshta regions synchronization';

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
        \Log::debug('CALL COMMAND [novaposhta:regions]');

        $response = Http::timeout($this->httpResponseTimeout)
            ->retry($this->httpRetryMaxTime, $this->httpRetryDelay)
            ->withHeaders($this->httpHeaders)
            ->post($this->baseUri . $this->format . '/Address/getAreas', [
                'modelName' => 'Address',
                'calledMethod' => 'getAreas'
            ]);

        $this->line($response->body());
    }
}

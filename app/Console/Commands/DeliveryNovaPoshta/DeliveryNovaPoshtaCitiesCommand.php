<?php

namespace App\Console\Commands\DeliveryNovaPoshta;


use Illuminate\Support\Facades\Http;

class DeliveryNovaPoshtaCitiesCommand extends DeliveryNovaPoshtaCommand
{
    /**
     * @var string
     */
    protected $signature = 'novaposhta:cities';

    /**
     * @var string
     */
    protected $description = 'Nova Poshta cities synchronization';

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
        \Log::debug('CALL COMMAND [novaposhta:cities]');

        $response = Http::timeout($this->httpResponseTimeout)
            ->retry($this->httpRetryMaxTime, $this->httpRetryDelay)
            ->withHeaders($this->httpHeaders)
            ->post($this->baseUri . $this->format . '/Address/getCities', [
                'modelName' => 'Address',
                'calledMethod' => 'getCities'
            ]);

        $this->line($response->body());
    }
}

<?php

namespace App\Console\Commands\DeliveryNovaPoshta;

use Illuminate\Console\Command;

abstract class DeliveryNovaPoshtaCommand extends Command
{

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var string
     */
    protected $api;

    /**
     * @var string
     */
    protected $httpResponseTimeout;

    /**
     * @var string
     */
    protected $httpRetryMaxTime;

    /**
     * @var string
     */
    protected $httpRetryDelay;

    /**
     * @var array
     */
    protected $httpHeaders = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json',
    ];

    /**
     * DeliveryNovaPoshtaCommand constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->baseUri = config('novaposhta.base_uri');
        $this->format = config('novaposhta.format');
        $this->api = config('novaposhta.api_key');
        $this->httpResponseTimeout = config('novaposhta.http_response_timeout', 3);
        $this->httpRetryMaxTime = config('novaposhta.http_retry_max_time', 2);
        $this->httpRetryDelay = config('novaposhta.http_retry_delay', 200);
    }
}

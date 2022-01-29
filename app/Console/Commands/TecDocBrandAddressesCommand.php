<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocBrandAddressesCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:brand-addresses {brandId}';

    /**
     * @var string
     */
    protected $description = 'Generate TecDoc Brand Addresses';

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
        $brandId = (int)$this->argument('brandId');

        \Log::debug('CALL COMMAND [tecdoc:brand-addresses] [' . $brandId . ']');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getAmBrandAddress' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'articleCountry' => config('tecdoc.api.country'),
                'brandNo' => $brandId,
            ]
        ]);

        $this->line($response->body());
    }
}

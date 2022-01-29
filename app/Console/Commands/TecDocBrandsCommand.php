<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocBrandsCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:brands';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Brands';

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
        \Log::debug('CALL COMMAND [tecdoc:brands]');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getAmBrands' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'articleCountry' => config('tecdoc.api.language'),
            ]
        ]);

        $this->line($response->body());
    }
}

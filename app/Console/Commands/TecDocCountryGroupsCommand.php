<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocCountryGroupsCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:country-groups';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Country Groups';

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
        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getCountryGroups' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
            ]
        ]);

        $this->line($response->body());
    }
}

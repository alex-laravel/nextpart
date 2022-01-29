<?php

namespace App\Console\Commands;


use Illuminate\Support\Facades\Http;

class TecDocGenericArticlesCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:generic-articles';

    /**
     * @var string
     */
    protected $description = 'Generate TecDoc Generic Articles';

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
        \Log::debug('CALL COMMAND [tecdoc:generic-articles]');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getGenericArticles' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'articleCountry' => config('tecdoc.api.country'),
                'searchTreeNodes' => true
            ]
        ]);

        $this->line($response->body());
    }
}

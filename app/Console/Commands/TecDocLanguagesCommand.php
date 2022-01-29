<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocLanguagesCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:languages';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Languages';

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
            'getLanguages' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
            ]
        ]);

        $this->line($response->body());
    }
}

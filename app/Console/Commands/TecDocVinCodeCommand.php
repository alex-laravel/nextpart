<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocVinCodeCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:vin-code-decoding {vinCode}';

    /**
     * @var string
     */
    protected $description = 'Decode Vehicle VIN code';

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
        \Log::debug('CALL COMMAND [tecdoc:vin-code-decoding]');

        $vinCode = $this->argument('vinCode');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getVehiclesByVIN' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'vin' => $vinCode,
            ]
        ]);

        $this->line($response->body());
    }
}

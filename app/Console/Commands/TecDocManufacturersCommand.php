<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocManufacturersCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:manufacturers {country} {countryGroup} {linkingTargetType}';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Manufacturers';

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
        $country = $this->argument('country');
        $countryGroup = $this->argument('countryGroup');
        $linkingTargetType = $this->argument('linkingTargetType');

        $countryGroupFlag = !empty($countryGroup);

        \Log::debug('CALL COMMAND [tecdoc:manufacturers] [' . $country . '] [' . $countryGroup . '] [' . $linkingTargetType . ']');

        $response = Http::withHeaders(['X-Api-Key' => config('tecdoc.api.key')])->post(config('tecdoc.api.url'), [
            'getManufacturers2' => [
                'provider' => config('tecdoc.api.provider'),
                'lang' => config('tecdoc.api.language'),
                'country' => $countryGroupFlag ? $countryGroup : $country,
                'countryGroupFlag' => $countryGroupFlag,
                'linkingTargetType' => $linkingTargetType,
            ]
        ]);

        $this->line($response->body());
    }
}

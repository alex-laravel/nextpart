<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Http;

class TecDocVersionCommand extends TecDocCommand
{
    /**
     * @var string
     */
    protected $signature = 'tecdoc:version';

    /**
     * @var string
     */
    protected $description = 'Sync TecDoc Version';

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
        $response = Http::post(config('tecdoc.api.url'), [
            'getPegasusVersionInfo2' => [
                'provider' => config('tecdoc.api.provider')
            ]
        ]);

//        $response = Http::post(config('tecdoc.api.url'), [
//            'getAPIKeyForUser' => [
//                'catalog' => 'tecdocsw',
//                'username' => '208986u1',
//                'password' => '#Lb8zjwF',
//            ]
//        ]);

        $this->line($response->body());
    }
}

<?php

namespace Database\Seeders;

use Database\Seeders\Shop\PriceSchemeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        $this->call(PriceSchemeSeeder::class);
    }
}

<?php

namespace Database\Seeders\Shop;

use App\Models\PriceScheme\PriceScheme;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PriceSchemeSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run()
    {
        PriceScheme::truncate();

        $priceSchemes = [
            [
                'price_from' => 1,
                'price_to' => 100,
                'percentage' => 75,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'price_from' => 101,
                'price_to' => 500,
                'percentage' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'price_from' => 501,
                'price_to' => 1000,
                'percentage' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'price_from' => 1001,
                'price_to' => 50000,
                'percentage' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'price_from' => 50001,
                'price_to' => 100000,
                'percentage' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'price_from' => 100001,
                'price_to' => 1000000,
                'percentage' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        PriceScheme::insert($priceSchemes);
    }
}

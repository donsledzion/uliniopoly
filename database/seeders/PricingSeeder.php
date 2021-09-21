<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pricings')->insert([
            'buy' => 0,
            'mortgage' => 0,
            'stop_single' => 0,
            'stop_1_cottage' => 0,
            'stop_2_cottage' => 0,
            'stop_3_cottage' => 0,
            'stop_4_cottage' => 0,
            'stop_hotel' => 0,
            'stop_1_of_kind' => 0,
            'stop_2_of_kind' => 0,
            'stop_3_of_kind' => 0,
            'stop_4_of_kind' => 0,
        ]);
    }
}

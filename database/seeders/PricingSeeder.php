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
        //default pricing - nothing to pay for...
        // pricing id = 1 ,
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

        // pricing for default carriers
        // pricing id = 2 ,
        DB::table('pricings')->insert([
            'buy' => 200,
            'mortgage' => 100,
            'stop_single' => 25,
            'stop_1_cottage' => 0,
            'stop_2_cottage' => 0,
            'stop_3_cottage' => 0,
            'stop_4_cottage' => 0,
            'stop_hotel' => 0,
            'stop_1_of_kind' => 25,
            'stop_2_of_kind' => 50,
            'stop_3_of_kind' => 100,
            'stop_4_of_kind' => 200,
        ]);

        // pricing for default services
        // stop single and 1,2 of kind are multipliers of drawn result!
        // pricing id = 3 ,
        DB::table('pricings')->insert([
            'buy' => 150,
            'mortgage' => 75,
            'stop_single' => 4,
            'stop_1_cottage' => 0,
            'stop_2_cottage' => 0,
            'stop_3_cottage' => 0,
            'stop_4_cottage' => 0,
            'stop_hotel' => 0,
            'stop_1_of_kind' => 4,
            'stop_2_of_kind' => 10,
            'stop_3_of_kind' => 0,
            'stop_4_of_kind' => 0,
        ]);

        // pricing for default income tax
        // pricing id = 4 ,
        DB::table('pricings')->insert([
            'buy' => 0,
            'mortgage' => 0,
            'stop_single' => 200,
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

        // pricing for default wealth tax
        // pricing id = 5 ,
        DB::table('pricings')->insert([
            'buy' => 0,
            'mortgage' => 0,
            'stop_single' => 75,
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

        // ===============================================================
        // ===============================================================
        // Here start pricing for properties
        // First district
        // pricing id = 6 ,
        DB::table('pricings')->insert([
            'buy' => 60,
            'mortgage' => 30,
            'stop_single' => 2,
            'stop_1_cottage' => 10,
            'stop_2_cottage' => 30,
            'stop_3_cottage' => 90,
            'stop_4_cottage' => 160,
            'stop_hotel' => 250,
            'stop_1_of_kind' => 2,
            'stop_2_of_kind' => 4,
            'stop_3_of_kind' => 0,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 50,
        ]);

        // First district
        // pricing id = 7 ,
        DB::table('pricings')->insert([
            'buy' => 60,
            'mortgage' => 30,
            'stop_single' => 4,
            'stop_1_cottage' => 20,
            'stop_2_cottage' => 60,
            'stop_3_cottage' => 180,
            'stop_4_cottage' => 320,
            'stop_hotel' => 450,
            'stop_1_of_kind' => 4,
            'stop_2_of_kind' => 8,
            'stop_3_of_kind' => 0,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 50,
        ]);
        // ===============================================================

        // Second district (fields 2-1 and 2-2)
        // pricing id = 8 ,
        DB::table('pricings')->insert([
            'buy' => 100,
            'mortgage' => 50,
            'stop_single' => 6,
            'stop_1_cottage' => 30,
            'stop_2_cottage' => 90,
            'stop_3_cottage' => 270,
            'stop_4_cottage' => 400,
            'stop_hotel' => 550,
            'stop_1_of_kind' => 6,
            'stop_2_of_kind' => 6,
            'stop_3_of_kind' => 12,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 50,
        ]);

        // Second district (field 2-3)
        // pricing id = 9 ,
        DB::table('pricings')->insert([
            'buy' => 120,
            'mortgage' => 50,
            'stop_single' => 8,
            'stop_1_cottage' => 40,
            'stop_2_cottage' => 100,
            'stop_3_cottage' => 300,
            'stop_4_cottage' => 450,
            'stop_hotel' => 600,
            'stop_1_of_kind' => 8,
            'stop_2_of_kind' => 8,
            'stop_3_of_kind' => 16,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 50,
        ]);

        // ===============================================================

        // Third district (fields 3-1 and 3-2)
        // pricing id = 10 ,
        DB::table('pricings')->insert([
            'buy' => 140,
            'mortgage' => 70,
            'stop_single' => 10,
            'stop_1_cottage' => 50,
            'stop_2_cottage' => 150,
            'stop_3_cottage' => 450,
            'stop_4_cottage' => 625,
            'stop_hotel' => 750,
            'stop_1_of_kind' => 10,
            'stop_2_of_kind' => 10,
            'stop_3_of_kind' => 20,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 100,
        ]);

        // Second district (field 3-3)
        // pricing id = 11 ,
        DB::table('pricings')->insert([
            'buy' => 160,
            'mortgage' => 80,
            'stop_single' => 12,
            'stop_1_cottage' => 60,
            'stop_2_cottage' => 180,
            'stop_3_cottage' => 500,
            'stop_4_cottage' => 700,
            'stop_hotel' => 900,
            'stop_1_of_kind' => 12,
            'stop_2_of_kind' => 12,
            'stop_3_of_kind' => 24,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 100,
        ]);

        // ===============================================================

        // Fourth district (fields 4-1 and 4-2)
        // pricing id = 12 ,
        DB::table('pricings')->insert([
            'buy' => 180,
            'mortgage' => 90,
            'stop_single' => 14,
            'stop_1_cottage' => 70,
            'stop_2_cottage' => 200,
            'stop_3_cottage' => 550,
            'stop_4_cottage' => 755,
            'stop_hotel' => 950,
            'stop_1_of_kind' => 14,
            'stop_2_of_kind' => 14,
            'stop_3_of_kind' => 28,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 100,
        ]);

        // Second district (field 4-3)
        // pricing id = 13 ,
        DB::table('pricings')->insert([
            'buy' => 200,
            'mortgage' => 100,
            'stop_single' => 16,
            'stop_1_cottage' => 80,
            'stop_2_cottage' => 220,
            'stop_3_cottage' => 600,
            'stop_4_cottage' => 800,
            'stop_hotel' => 1000,
            'stop_1_of_kind' => 16,
            'stop_2_of_kind' => 16,
            'stop_3_of_kind' => 32,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 100,
        ]);

        // ===============================================================

        // Fifth district (fields 5-1 and 5-2)
        // pricing id = 14 ,
        DB::table('pricings')->insert([
            'buy' => 220,
            'mortgage' => 110,
            'stop_single' => 18,
            'stop_1_cottage' => 90,
            'stop_2_cottage' => 250,
            'stop_3_cottage' => 700,
            'stop_4_cottage' => 875,
            'stop_hotel' => 1050,
            'stop_1_of_kind' => 18,
            'stop_2_of_kind' => 18,
            'stop_3_of_kind' => 36,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 150,
        ]);

        // Fifth district (field 5-3)
        // pricing id = 15 ,
        DB::table('pricings')->insert([
            'buy' => 240,
            'mortgage' => 120,
            'stop_single' => 20,
            'stop_1_cottage' => 100,
            'stop_2_cottage' => 300,
            'stop_3_cottage' => 750,
            'stop_4_cottage' => 925,
            'stop_hotel' => 1100,
            'stop_1_of_kind' => 20,
            'stop_2_of_kind' => 20,
            'stop_3_of_kind' => 40,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 150,
        ]);

        // ===============================================================

        // Sixth district (fields 6-1 and 6-2)
        // pricing id = 16 ,
        DB::table('pricings')->insert([
            'buy' => 260,
            'mortgage' => 130,
            'stop_single' => 22,
            'stop_1_cottage' => 110,
            'stop_2_cottage' => 330,
            'stop_3_cottage' => 800,
            'stop_4_cottage' => 975,
            'stop_hotel' => 1150,
            'stop_1_of_kind' => 22,
            'stop_2_of_kind' => 22,
            'stop_3_of_kind' => 44,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 150,
        ]);

        // Sixth district (field 6-3)
        // pricing id = 17 ,
        DB::table('pricings')->insert([
            'buy' => 280,
            'mortgage' => 140,
            'stop_single' => 24,
            'stop_1_cottage' => 120,
            'stop_2_cottage' => 360,
            'stop_3_cottage' => 850,
            'stop_4_cottage' => 1025,
            'stop_hotel' => 1200,
            'stop_1_of_kind' => 24,
            'stop_2_of_kind' => 24,
            'stop_3_of_kind' => 48,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 150,
        ]);

        // ===============================================================

        // Seventh district (fields 7-1 and 7-2)
        // pricing id = 18 ,
        DB::table('pricings')->insert([
            'buy' => 300,
            'mortgage' => 150,
            'stop_single' => 26,
            'stop_1_cottage' => 130,
            'stop_2_cottage' => 390,
            'stop_3_cottage' => 900,
            'stop_4_cottage' => 1100,
            'stop_hotel' => 1275,
            'stop_1_of_kind' => 26,
            'stop_2_of_kind' => 26,
            'stop_3_of_kind' => 52,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 200,
        ]);

        // Seventh district (field 7-3)
        // pricing id = 19 ,
        DB::table('pricings')->insert([
            'buy' => 320,
            'mortgage' => 160,
            'stop_single' => 28,
            'stop_1_cottage' => 150,
            'stop_2_cottage' => 450,
            'stop_3_cottage' => 1000,
            'stop_4_cottage' => 1200,
            'stop_hotel' => 1400,
            'stop_1_of_kind' => 28,
            'stop_2_of_kind' => 28,
            'stop_3_of_kind' => 56,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 200,
        ]);

        // ===============================================================

        // Eight district (field 8-1)
        // pricing id = 20 ,
        DB::table('pricings')->insert([
            'buy' => 350,
            'mortgage' => 175,
            'stop_single' => 35,
            'stop_1_cottage' => 175,
            'stop_2_cottage' => 500,
            'stop_3_cottage' => 1100,
            'stop_4_cottage' => 1300,
            'stop_hotel' => 1500,
            'stop_1_of_kind' => 35,
            'stop_2_of_kind' => 70,
            'stop_3_of_kind' => 0,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 200,
        ]);

        // Eight district (field 8-1)
        // pricing id = 21 ,
        DB::table('pricings')->insert([
            'buy' => 400,
            'mortgage' => 200,
            'stop_single' => 50,
            'stop_1_cottage' => 200,
            'stop_2_cottage' => 600,
            'stop_3_cottage' => 1400,
            'stop_4_cottage' => 1700,
            'stop_hotel' => 2000,
            'stop_1_of_kind' => 50,
            'stop_2_of_kind' => 100,
            'stop_3_of_kind' => 0,
            'stop_4_of_kind' => 0,
            'buy_cottage' => 200,
        ]);
    }
}

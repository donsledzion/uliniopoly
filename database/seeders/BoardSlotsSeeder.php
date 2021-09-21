<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSlotsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1 ; $i < 41 ; $i++){
            DB::table('board_slots')->insert([
                'name' => 'slot_'.$i
            ]);
        }
    }
}

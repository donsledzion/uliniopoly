<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
            'name' => 'uliniopoly.boards.names.default',
            'description' => 'uliniopoly.boards.descriptions.default',
        ]);

        for($i = 1 ; $i < 41 ; $i++) {
            if($i === 1){
                $field = 2 ;
            } else if($i ===11){
                $field = 3 ;
            } else if($i ===21){
                $field = 4 ;
            } else if($i ===31){
                $field = 5 ;
            } else {
                $field = 1 ;
            }
            DB::table('board_slot_field')->insert([
                'board_id' => 1,
                'board_slot_id' => $i,
                'field_id' => $field,
            ]);
        }
    }
}

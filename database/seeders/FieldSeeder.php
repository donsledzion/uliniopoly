<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.default',
            'description' => 'uliniopoly.fields.names.default',
            'field_type_id' => 1,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.start',
            'description' => 'uliniopoly.fields.names.start',
            'field_type_id' => 2,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.jail',
            'description' => 'uliniopoly.fields.names.jail',
            'field_type_id' => 3,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.go_to_jail',
            'description' => 'uliniopoly.fields.names.go_to_jail',
            'field_type_id' => 4,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.free_parking',
            'description' => 'uliniopoly.fields.names.free_parking',
            'field_type_id' => 5,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.default',
            'description' => 'uliniopoly.field_types.descriptions.default',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.start',
            'description' => 'uliniopoly.field_types.descriptions.start',
            'unique' => 1,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.jail',
            'description' => 'uliniopoly.field_types.descriptions.jail',
            'unique' => 1,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.go_to_jail',
            'description' => 'uliniopoly.field_types.descriptions.go_to_jail',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.parking',
            'description' => 'uliniopoly.field_types.descriptions.parking',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.tax',
            'description' => 'uliniopoly.field_types.descriptions.tax',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.risk',
            'description' => 'uliniopoly.field_types.descriptions.risk',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.chance',
            'description' => 'uliniopoly.field_types.descriptions.chance',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.property',
            'description' => 'uliniopoly.field_types.descriptions.property',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.carrier',
            'description' => 'uliniopoly.field_types.descriptions.carrier',
            'unique' => 0,
        ]);

        DB::table('field_types')->insert([
            'name' => 'uliniopoly.field_types.names.service',
            'description' => 'uliniopoly.field_types.descriptions.service',
            'unique' => 0,
        ]);
    }
}

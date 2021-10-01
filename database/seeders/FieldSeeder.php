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
            'description' => 'uliniopoly.fields.descriptions.default',
            'field_type_id' => 1,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.start',
            'description' => 'uliniopoly.fields.descriptions.start',
            'field_type_id' => 2,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.jail',
            'description' => 'uliniopoly.fields.descriptions.jail',
            'field_type_id' => 3,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.go_to_jail',
            'description' => 'uliniopoly.fields.descriptions.go_to_jail',
            'field_type_id' => 4,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.free_parking',
            'description' => 'uliniopoly.fields.descriptions.free_parking',
            'field_type_id' => 5,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        // after seeding first five available fields it's time to prepare rest of them

        // carriers - Boguś Bus
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.carriers.bogus_bus',
            'description' => 'uliniopoly.fields.descriptions.carriers.bogus_bus',
            'field_type_id' => 10,
            'pricing_id' => 2 ,
            'salable' => 1 ,
        ]);

        // carriers - PKS
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.carriers.pks_slupsk',
            'description' => 'uliniopoly.fields.descriptions.carriers.pks_slupsk',
            'field_type_id' => 10,
            'pricing_id' => 2 ,
            'salable' => 1 ,
        ]);

        // services - Septic
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.services.septic',
            'description' => 'uliniopoly.fields.descriptions.services.septic',
            'field_type_id' => 11,
            'pricing_id' => 3 ,
            'salable' => 1 ,
        ]);

        // services - Garbage
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.services.garbage',
            'description' => 'uliniopoly.fields.descriptions.services.garbage',
            'field_type_id' => 11,
            'pricing_id' => 3 ,
            'salable' => 1 ,
        ]);

        // cards - chance
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.cards.chance',
            'description' => 'uliniopoly.fields.descriptions.cards.chance',
            'field_type_id' => 8,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);

        // cards - risk
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.cards.risk',
            'description' => 'uliniopoly.fields.descriptions.cards.risk',
            'field_type_id' => 7,
            'pricing_id' => 1 ,
            'salable' => 0 ,
        ]);


        // taxes - income
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.tax.income',
            'description' => 'uliniopoly.fields.descriptions.tax.income',
            'field_type_id' => 6,
            'pricing_id' => 4 ,
            'salable' => 0 ,
        ]);

        // taxes - wealth
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.tax.wealth',
            'description' => 'uliniopoly.fields.descriptions.tax.wealth',
            'field_type_id' => 6,
            'pricing_id' => 5 ,
            'salable' => 0 ,
        ]);

        // Here start PROPERTIES to sale from first "wall".
        // Naming rules: property-district_number-field_number,
        // first field of first district will be property-1-1 etc.

        // ======================================================================
        // First district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.1-1',
            'description' => 'uliniopoly.fields.descriptions.properties.1-1',
            'field_type_id' => 9,
            'pricing_id' => 6 ,
            'salable' => 1 ,
        ]);
        // First district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.1-2',
            'description' => 'uliniopoly.fields.descriptions.properties.1-2',
            'field_type_id' => 9,
            'pricing_id' => 7 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Second district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.2-1',
            'description' => 'uliniopoly.fields.descriptions.properties.2-1',
            'field_type_id' => 9,
            'pricing_id' => 8 ,
            'salable' => 1 ,
        ]);
        // Second district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.2-2',
            'description' => 'uliniopoly.fields.descriptions.properties.2-2',
            'field_type_id' => 9,
            'pricing_id' => 8 ,
            'salable' => 1 ,
        ]);
        // Second district, third field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.2-3',
            'description' => 'uliniopoly.fields.descriptions.properties.2-3',
            'field_type_id' => 9,
            'pricing_id' => 9 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Third district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.3-1',
            'description' => 'uliniopoly.fields.descriptions.properties.3-1',
            'field_type_id' => 9,
            'pricing_id' => 10 ,
            'salable' => 1 ,
        ]);
        // Third district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.3-2',
            'description' => 'uliniopoly.fields.descriptions.properties.3-2',
            'field_type_id' => 9,
            'pricing_id' => 10 ,
            'salable' => 1 ,
        ]);
        // Third district, third field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.3-3',
            'description' => 'uliniopoly.fields.descriptions.properties.3-3',
            'field_type_id' => 9,
            'pricing_id' => 11 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Fourth district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.4-1',
            'description' => 'uliniopoly.fields.descriptions.properties.4-1',
            'field_type_id' => 9,
            'pricing_id' => 12 ,
            'salable' => 1 ,
        ]);
        // Fourth district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.4-2',
            'description' => 'uliniopoly.fields.descriptions.properties.4-2',
            'field_type_id' => 9,
            'pricing_id' => 12 ,
            'salable' => 1 ,
        ]);
        // Fourth district, third field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.4-3',
            'description' => 'uliniopoly.fields.descriptions.properties.4-3',
            'field_type_id' => 9,
            'pricing_id' => 13 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Fifth district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.5-1',
            'description' => 'uliniopoly.fields.descriptions.properties.5-1',
            'field_type_id' => 9,
            'pricing_id' => 14 ,
            'salable' => 1 ,
        ]);
        // Fifth district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.5-2',
            'description' => 'uliniopoly.fields.descriptions.properties.5-2',
            'field_type_id' => 9,
            'pricing_id' => 14 ,
            'salable' => 1 ,
        ]);
        // Fifth district, third field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.5-3',
            'description' => 'uliniopoly.fields.descriptions.properties.5-3',
            'field_type_id' => 9,
            'pricing_id' => 15 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Sixth district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.6-1',
            'description' => 'uliniopoly.fields.descriptions.properties.6-1',
            'field_type_id' => 9,
            'pricing_id' => 16 ,
            'salable' => 1 ,
        ]);
        // Sixth district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.6-2',
            'description' => 'uliniopoly.fields.descriptions.properties.6-2',
            'field_type_id' => 9,
            'pricing_id' => 16 ,
            'salable' => 1 ,
        ]);
        // Sixth district, third field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.6-3',
            'description' => 'uliniopoly.fields.descriptions.properties.6-3',
            'field_type_id' => 9,
            'pricing_id' => 17 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Seventh district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.7-1',
            'description' => 'uliniopoly.fields.descriptions.properties.7-1',
            'field_type_id' => 9,
            'pricing_id' => 18 ,
            'salable' => 1 ,
        ]);
        // Seventh district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.7-2',
            'description' => 'uliniopoly.fields.descriptions.properties.7-2',
            'field_type_id' => 9,
            'pricing_id' => 18 ,
            'salable' => 1 ,
        ]);
        // Seventh district, third field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.7-3',
            'description' => 'uliniopoly.fields.descriptions.properties.7-3',
            'field_type_id' => 9,
            'pricing_id' => 19 ,
            'salable' => 1 ,
        ]);

        // ======================================================================
        // Eight district, first field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.8-1',
            'description' => 'uliniopoly.fields.descriptions.properties.8-1',
            'field_type_id' => 9,
            'pricing_id' => 20 ,
            'salable' => 1 ,
        ]);
        // Eight district, second field:
        DB::table('fields')->insert([
            'name' => 'uliniopoly.fields.names.properties.8-2',
            'description' => 'uliniopoly.fields.descriptions.properties.8-2',
            'field_type_id' => 9,
            'pricing_id' => 21 ,
            'salable' => 1 ,
        ]);

    }
}

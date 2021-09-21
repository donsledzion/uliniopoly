<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' =>'Adam',
            'email' => 'adam@ulinia8.pl',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'name' =>'Sasha',
            'email' => 'sasha@rocco.it',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'name' =>'Roman',
            'email' => 'romek@atomek.ru',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'name' =>'Bottas',
            'email' => 'bot@ass.fn',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'name' =>'Agnieszka',
            'email' => 'agnieszka@heheszka.rb',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);

        DB::table('users')->insert([
            'name' =>'Hanka',
            'email' => 'hanka@skakanka.op',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'remember_token' => Str::random(10)
        ]);
    }
}

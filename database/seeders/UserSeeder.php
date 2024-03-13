<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => "Esneider Buelvas",
            'email' => "embuelvasolivo@gmail.com",
            'password' =>  Hash::make('em12345'),
        ]);

        DB::table('users')->insert([
            'name' => "Cesar Ortiz",
            'email' => "cesarortiz",
            'password' => Hash::make('ces12345'),
        ]);

        DB::table('users')->insert([
            'name' => "Laura Salcedo",
            'email' => "laura@gmail.com",
            'password' =>  Hash::make('laura12345'),
        ]);

    }
}

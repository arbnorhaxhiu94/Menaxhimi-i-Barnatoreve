<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depos')->insert([
            'emri' => 'Ampicilin',
            'bar_kodi' => '111111',
            'sasia' => 600
        ]);
        DB::table('depos')->insert([
            'emri' => 'Paracetamol',
            'bar_kodi' => '222222',
            'sasia' => 400
        ]);
        DB::table('depos')->insert([
            'emri' => 'Tylol',
            'bar_kodi' => '333333',
            'sasia' => 250
        ]);
    }
}

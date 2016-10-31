<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('currencies')->insert([
            'shortName' => 'EUR',
            'fullName' => 'Euro',
        ]);

        DB::table('currencies')->insert([
            'shortName' => 'CZK',
            'fullName' => 'Ceska koruna',
        ]);

        DB::table('currencies')->insert([
            'shortName' => 'RSD',
            'fullName' => 'Serbian dinar',
        ]);
    }
}

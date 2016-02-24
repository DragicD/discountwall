<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
            'city' => 'Novi Sad',
            'country' => 'Serbia',
            'postal_code' => '21 000',
        ]);

        DB::table('cities')->insert([
            'city' => 'Brno',
            'country' => 'Czech republic',
            'postal_code' => '12321',
        ]);
    }
}

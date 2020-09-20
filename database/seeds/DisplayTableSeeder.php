<?php

use App\DisplayType;
use Illuminate\Database\Seeder;

class DisplayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [

            'Disable Ad ',
            'Google Admob Ad ',
            'Facebook Network Audience Ad ',
            'Both'
        ];

        foreach ($names as $name){

            DisplayType::create([

                'name' => $name

            ]);

        }

    }
}

<?php

use App\AdSetting;
use Illuminate\Database\Seeder;

class AdSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Admob', 'Fb'];


        foreach ($names as $key => $name){

            AdSetting::create([

                'name' => $name,
                'status' => 0

            ]);
        }

    }
}

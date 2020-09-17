<?php

use App\AdStatus;
use Illuminate\Database\Seeder;

class AdStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adStatuses = ['admob', 'fb'];

        foreach ($adStatuses as $adStatus){

            AdStatus::create([

                'name' => $adStatus,
                'status' => 0

            ]);
        }

    }
}

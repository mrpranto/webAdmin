<?php

use App\Ads;
use Illuminate\Database\Seeder;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Rewarded', 'Native Banner', 'Banner', 'Interstitial', 'Native'];

        foreach ($names as $name){
            Ads::create([

                'name'=> $name

            ]);
        }
    }
}

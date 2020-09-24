<?php

use App\DisplayType;
use Illuminate\Database\Seeder;

class CustomizeAddToDisplyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisplayType::create([

            'name' => 'Customize Banner',

        ]);

    }
}

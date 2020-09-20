<?php

use App\new_version;
use Illuminate\Database\Seeder;

class NewVersionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        new_version::create([

            'enable' => 0

        ]);
    }
}

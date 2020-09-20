<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call(AdSettingTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(DisplayTableSeeder::class);
        $this->call(NewVersionTableSeeder::class);
    }
}

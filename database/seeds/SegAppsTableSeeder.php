<?php

use Illuminate\Database\Seeder;

class SegAppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\SegApps::class, 5)->create();
    }
}

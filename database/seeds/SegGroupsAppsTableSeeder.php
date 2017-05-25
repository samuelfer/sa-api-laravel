<?php

use Illuminate\Database\Seeder;

class SegGroupsAppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\SegGroupsApps::class, 2)->create();
    }
}

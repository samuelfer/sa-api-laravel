<?php

use Illuminate\Database\Seeder;

class SegGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\SegGroups::class, 1)->create();
    }
}

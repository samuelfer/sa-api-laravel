<?php

use Illuminate\Database\Seeder;

class RacaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Raca::class, 1)->create();
    }
}

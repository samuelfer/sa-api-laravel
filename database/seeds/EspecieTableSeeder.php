<?php

use Illuminate\Database\Seeder;

class EspecieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Especie::class, 1)->create();
    }
}

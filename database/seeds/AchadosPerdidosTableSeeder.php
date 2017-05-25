<?php

use Illuminate\Database\Seeder;

class AchadosPerdidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\AchadosPerdidos::class, 1)->create();
    }
}

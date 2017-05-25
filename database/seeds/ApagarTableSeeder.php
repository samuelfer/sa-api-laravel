<?php

use Illuminate\Database\Seeder;

class ApagarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Apagar::class, 2)->create();
    }
}

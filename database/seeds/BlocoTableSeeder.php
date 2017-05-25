<?php

use Illuminate\Database\Seeder;

class BlocoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Bloco::class, 1)->create();
    }
}

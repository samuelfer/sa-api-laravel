<?php

use Illuminate\Database\Seeder;

class ImovelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Imovel::class, 1)->create();
    }
}

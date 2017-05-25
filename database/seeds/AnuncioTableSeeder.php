<?php

use Illuminate\Database\Seeder;

class AnuncioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\Anuncio::class, 5)->create();
    }
}

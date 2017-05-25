<?php

use Illuminate\Database\Seeder;

class AgendaCompromissoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\AgendaCompromisso::class, 5)->create();
    }
}

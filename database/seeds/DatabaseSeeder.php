<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BillPaysTableSeeder::class);
        $this->call(ReservasTableSeeder::class);
        $this->call(InadimplentesTableSeeder::class);
        $this->call(TipoAreasTableSeeder::class);
        $this->call(AreaPaisTableSeeder::class);
        $this->call(AreaComumTableSeeder::class);
        $this->call(BlocoTableSeeder::class);
        $this->call(ImovelTableSeeder::class);

        $this->call(CondominioTableSeeder::class);
        $this->call(AchadosPerdidosTableSeeder::class);
        $this->call(AgendaCompromissoTableSeeder::class);
        $this->call(RacaTableSeeder::class);
        $this->call(EspecieTableSeeder::class);
        $this->call(AnimalTableSeeder::class);
        $this->call(AnuncioTableSeeder::class);
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(ApagarTableSeeder::class);
        $this->call(SegAppsTableSeeder::class);
        $this->call(SegGroupsTableSeeder::class);
        $this->call(SegGroupsAppsTableSeeder::class);
    }
}

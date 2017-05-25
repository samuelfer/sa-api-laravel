<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\SA\Models\User::class,1)->create([
            'login' => 'imo101',
            'password' => 'fernandes',
            'name' => 'samuel',
            'recebe_sms' => 'S',
            'active' => 'S',
            'activation_code' => 'S',
            'priv_admin' => 'S',
            'recebe_email' => 'S',
            'recebe_email_achados_perdidos' => 'S',
            'email' => 'samuelf_sant@hotmail.com',
            'email_alt' => 'samuelfesant@gmail.com',
            'telefone' => '000000000',
            'telefone_alt' => '9999999999',
            'st_veiculo' => 'S',
            'st_aviso' => 'S',
            'remember_token' => '',
            'created_at' => '2017-04-12',
            'updated_at' => '2017-04-12',
        ]);
        //factory(\SA\Models\User::class,20)->create();
    }
}

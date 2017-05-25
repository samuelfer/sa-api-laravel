<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\SA\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Samuel',
        'email' => 'samuelf_sant@hotmail.com',
        'email_alt' => 'samuelfesant@gmail.com',
        'telefone' => '0000000',
        'telefone_alt' => '9999999',
        'login' => 'imo101',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'recebe_sms' => 'S',
        'active' => 'S',
        'activation_code' => 'S',
        'priv_admin' => 'S',
        'recebe_email' => 'S',
        'recebe_email_achados_perdidos' => 'S',
        'st_veiculo' => 'S',
        'st_aviso' => 'S'
    ];
});

$factory->define(SA\Models\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'user_id' => '1'
    ];
});

$factory->define(SA\Models\BillPay::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->name,
        'date_due' => $faker->date(),
        'value' => $faker->randomFloat(2,100,1000),
        'done' => (bool) rand(0,1),
        'category_id' => '1',
        'user_id' => '1'
    ];
});

$factory->define(SA\Models\Reserva::class, function (Faker\Generator $faker) {

    return [
        'dt_reserva' => $faker->date(),
        'hr_inicio' => $faker->time(),
        'hr_fim' => $faker->time(),
        'id_numero_imovel' => '1',
        'id_bloco' => '1',
        'id_cadastro_reserva_area_comum' => rand(1,2),
        'id_area_pai' => rand(1,1)
    ];
});

$factory->define(SA\Models\Inadimplente::class, function (Faker\Generator $faker) {

    return [
        'usuario' => 'imo101',
        'st_inadimplente' => 'S'
    ];
});


$factory->define(SA\Models\TipoArea::class, function (Faker\Generator $faker) {

    return [
        'de_tipo_area' => $faker->name,
    ];
});

$factory->define(SA\Models\AreaPai::class, function (Faker\Generator $faker) {

    return [
        'id_area_pai' => '1',
        'de_area_pai' => $faker->name,
    ];
});

$factory->define(SA\Models\AreaComum::class, function (Faker\Generator $faker) {

    return [
        'id_tipo_area' => '1',
        'id_area_pai' => '1',
        'de_cadastro_reserva_area_comum' => $faker->name,
        'de_materiais' => $faker->name,
        'nu_valor' => $faker->randomFloat(2,100,1000),
        'hr_inicio' => $faker->time(),
        'hr_fim' => $faker->time(),
        'tmp_duracao' => rand(1,5),
        'st_horario_sn' => (bool) rand(0,1),
        'ignora_qtd_reserva' => (bool) rand(0,1),
        'nu_antecedencia_max' => 30,
        'nu_antecedencia_min' => 1,
        'qtd_reserva_mes' => 30,
        'perm_varias_reserva_dia' => (bool) rand(0,1),
        'qtd_reserva_mes_gratis' => (bool) rand(0,1),
        'qtd_reserva_ano_gratis' => (bool) rand(0,1),
    ];
});

$factory->define(SA\Models\Imovel::class, function (Faker\Generator $faker) {

    return [
        'id_numero_imovel' => '1',
        'id_bloco' => '1',
        'de_metragem_imovel' => rand(1,5),
        'de_metragem_imovel' => rand(1,5),
        'id_tipo_situacao_imovel' => rand(1,3),
        'de_observacao_imovel' => $faker->name,
        'id_proprietario' => rand(1,5),
        'usuario' => rand(1,5)
    ];
});


$factory->define(SA\Models\Bloco::class, function (Faker\Generator $faker) {

    return [
        'id_bloco' => '1',
        'de_bloco' => 'Bloco C',
    ];
});

$factory->define(SA\Models\Condominio::class, function (Faker\Generator $faker) {

    return [
        'no_condominio' => 'Cond teste',
        'img_logo' => 'imagem.jpg',
        'nu_cnpj_cnpf' => '000000000',
        'email_condominio' => 'codn@hotmail.com',
        'nu_cep_cond' => '58250000',
        'de_logradouro_cond' => 'Bloco C',
        'de_complemento_cond' => 'Bloco C',
        'nu_numero_cond' => '2',
        'de_bairro_cond' => 'Bloco C',
        'de_cidade_cond' => 'Joao Pessoa',
        'de_uf_cond' => 'PB',
        'de_obs_cond' => 'Bloco C',
        'endereco_site' => 'www.sind.com.br',

    ];
});


$factory->define(SA\Models\AchadosPerdidos::class, function (Faker\Generator $faker) {

    return [
        'de_local' => 'Piscina',
        'de_item' => 'lapis',
        'dt_achados_perdidos' => $faker->date(),
        'img_item' => 'img.jpg',
        'st_item' => 'A',
        'id_bloco' => '1',
        'id_numero_imovel' => '1',
        'de_perdeu' => $faker->name(),
        'id_funcionario' => rand(1,20),
        'id_morador' => rand(1,20),
        'st_entregue' => 'S',
        'dt_entrega' => $faker->date(),
        'hr_entrega' => $faker->time()

    ];
});


$factory->define(SA\Models\AgendaCompromisso::class, function (Faker\Generator $faker) {

    return [
        'dt_cadastro' => $faker->date(),
        'dt_agenda' => $faker->date(),
        'st_notificacao' => 'S',
        'de_responsavel' => $faker->name(),
        'de_titulo_tarefa' => $faker->name(),
        'de_tarefa' => $faker->name(),
        'st_status' => 'A',
        'nu_qtde_dias' => rand(1,3),
        'de_acao' => $faker->name()

    ];
});

$factory->define(SA\Models\Raca::class, function (Faker\Generator $faker) {

    return [
        'de_raca' => 'Pitbull',


    ];
});

$factory->define(SA\Models\Especie::class, function (Faker\Generator $faker) {

    return [
        'de_especie' => 'Canina'

    ];
});

$factory->define(SA\Models\Animal::class, function (Faker\Generator $faker) {

    return [
        'id_raca' => '1',
        'id_especie' => '1',
        'img_animal' => 'img.jpg',
        'id_numero_imovel' => '1',
        'id_bloco' => '1',
        'st_vacinado' => 'S'

    ];
});


$factory->define(SA\Models\Anuncio::class, function (Faker\Generator $faker) {

    return [
        'dt_anuncio' => $faker->date(),
        'hr_anuncio' => $faker->time(),
        'de_categoria' => $faker->name(),
        'de_titulo_anuncio' => $faker->name(),
        'de_anuncio' => $faker->name(),
        'imagem' => 'img.jpg',
        'nu_telefone' => '9999999999',
        'vl_anuncio' => $faker->randomFloat(2,100,1000)

    ];
});

$factory->define(SA\Models\TipoDocumento::class, function (Faker\Generator $faker) {

    return [
        'de_tipo_documento' => $faker->name(),

    ];
});

$factory->define(SA\Models\Apagar::class, function (Faker\Generator $faker) {

    return [
        'id_fornecedor' => rand(1,3),
        'id_tipo_documento' => '1',
        'dt_data' => $faker->date(),
        'nu_documento' => rand(1,3),
        'dt_vencimento' => $faker->date(),
        'nu_jurus' => rand(1,3),
        'nu_multa' => $faker->randomFloat(2,100,1000),
        'nu_valor' => $faker->randomFloat(2,100,1000),
        'nu_valor_pago' => $faker->randomFloat(2,100,1000),
        'deliquidado_sn' => 'N'

    ];
});


$factory->define(SA\Models\SegApps::class, function (Faker\Generator $faker) {

    return [
        'app_name' => 'form_reserva',
        'app_type' => 'formulario',
        'description' => 'Formulario de reservas',
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()
    ];
});

$factory->define(SA\Models\SegGroups::class, function (Faker\Generator $faker) {

    return [
        'description' => 'morador'

    ];
});

$factory->define(SA\Models\SegGroupsApps::class, function (Faker\Generator $faker) {

    return [
        'group_id' => rand(1,3),
        'seg_apps_id' => rand(1,3),
        'priv_access' => $faker->char('S'),
        'priv_insert' => $faker->char('S'),
        'priv_delete' => $faker->char('S'),
        'priv_update' => $faker->char('S'),
        'priv_export' => $faker->char('S'),
        'priv_print' => $faker->char('S'),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date()

    ];
});

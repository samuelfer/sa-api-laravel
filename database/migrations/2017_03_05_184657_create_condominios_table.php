<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCondominiosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('condominios', function(Blueprint $table) {
            $table->smallIncrements('id_condominio');
            $table->string('no_condominio');
            $table->string('img_logo',50)->nullable();
            $table->string('nu_cnpj',16)->nullable();
            $table->string('email_condominio',64);
            $table->string('nu_cep_cond',8)->nullable();
            $table->string('de_logradouro_cond',100)->nullable();
            $table->string('de_complemento_cond',150)->nullable();
            $table->integer('nu_numero_cond')->nullable();
            $table->string('de_bairro_cond',80)->nullable();
            $table->string('de_cidade_cond',80)->nullable();
            $table->char('de_uf_cond',2)->nullable();
            $table->text('de_observacao')->nullable();
            $table->string('de_site',60)->nullable();
            $table->smallInteger('id_administradora');


            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropIfExists('condominios');
	}

}

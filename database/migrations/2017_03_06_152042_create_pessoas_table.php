<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pessoas', function(Blueprint $table) {
            $table->increments('id_pessoa');
            $table->smallInteger('id_tipo_pessoa')->unsigned();
            $table->smallInteger('id_condominio')->unsigned();
            $table->date('dt_cadastro');
            $table->string('de_pessoa',100);
            $table->string('img_pessoa',100)->nullable();
            $table->date('dt_nascimento')->nullable();
            $table->string('nu_telefone',11)->nullable();
            $table->string('nu_celular',11)->nullable();
            $table->string('nu_cpf_cnpf',16)->nullable();
            $table->string('de_email',64)->nullable();
            $table->string('nu_rg',10)->nullable();
            $table->string('nu_cep',8)->nullable();
            $table->string('de_bairro',100)->nullable();
            $table->string('de_cidade',70)->nullable();
            $table->integer('nu_logradouro')->nullable();
            $table->string('de_logradouro',100)->nullable();
            $table->string('de_complemento',100)->nullable();
            $table->char('de_uf',1)->nullable();
            $table->text('de_observacao')->nullable();

            $table->timestamps();

            $table->foreign('id_tipo_pessoa')->references('id_tipo_pessoa')->on('tipo_pessoas')->onDelete('cascade');
            $table->foreign('id_condominio')->references('id_condominio')->on('condominios')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('pessoas');
	}

}

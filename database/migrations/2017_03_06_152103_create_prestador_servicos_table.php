<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestadorServicosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('prestador_servicos', function(Blueprint $table) {
            $table->increments('id_prestador');
            $table->smallInteger('id_tipo_servico')->unsigned();
            $table->integer('id_pessoa')->unsigned();
            $table->smallInteger('id_banco')->unsigned();
            $table->string('nu_agencia',8)->nullable();
            $table->string('nu_conta',8)->nullable();
            $table->smallInteger('id_tipo_conta')->nullable();
            $table->smallInteger('nu_operacao')->nullable();
            $table->decimal('media',10,2)->nullable();
            $table->char('st_ativo');
            $table->char('permissao',1);

            $table->timestamps();

            $table->foreign('id_tipo_servico')->references('id_tipo_servico')->on('tipo_servicos')->onDelete('cascade');
            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas')->onDelete('cascade');
            $table->foreign('id_banco')->references('id_banco')->on('bancos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('prestador_servicos');
	}

}

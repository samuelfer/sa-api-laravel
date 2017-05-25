<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historicos', function(Blueprint $table) {
            $table->increments('id_historico');
            $table->integer('id_pessoa')->unsigned();
            $table->smallInteger('id_tipo_pessoa')->unsigned();
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->date('dt_entrada')->nullable();
            $table->date('dt_inativacao')->nullable();

            $table->timestamps();

            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas')->onDelete('cascade');
            $table->foreign('id_tipo_pessoa')->references('id_tipo_pessoa')->on('tipo_pessoas')->onDelete('cascade');
            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('historicos');
	}

}

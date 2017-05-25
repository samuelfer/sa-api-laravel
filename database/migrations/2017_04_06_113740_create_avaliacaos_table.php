<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvaliacaosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avaliacaos', function(Blueprint $table) {
            $table->increments('id_avaliacao');
            $table->integer('nu_avaliacao');
            $table->integer('id_prestador')->unsigned();
            $table->date('dt_avaliacao');
            $table->text('observacao');


            $table->timestamps();

            $table->foreign('id_prestador')->references('id_prestador')->on('prestador_servicos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('avaliacaos');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitas', function(Blueprint $table) {
            $table->increments('id_visita');
            $table->smallInteger('id_bloco')->unsigned();
            $table->Integer('id_numero_imovel')->unsigned();
            $table->dateTime('dt_hr_visita');

            $table->timestamps();

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
		Schema::drop('visitas');
	}

}

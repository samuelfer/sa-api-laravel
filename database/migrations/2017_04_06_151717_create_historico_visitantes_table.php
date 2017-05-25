<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoVisitantesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('historico_visitantes', function(Blueprint $table) {
            $table->increments('id_historico_visitante');
            $table->integer('id_visitante')->unsigned();
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->dateTime('dt_hr_historico');
            $table->char('st_visita',1);

            $table->timestamps();

            $table->foreign('id_visitante')->references('id_visitante')->on('visitantes')->onDelete('cascade');
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
		Schema::drop('historico_visitantes');
	}

}

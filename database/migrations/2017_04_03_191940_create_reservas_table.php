<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservas', function(Blueprint $table) {
            $table->increments('id');
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->smallInteger('id_area_comum')->unsigned();
            $table->smallInteger('id_area_pai')->unsigned();
            $table->smallInteger('id_tipo_area')->unsigned();
            $table->date('dt_reserva');
            $table->time('hr_inicio');
            $table->time('hr_fim');
            $table->decimal('nu_valor',10,2);
            $table->string('status',10);
            $table->string('login',10);
            $table->char('st_termo',1);
            $table->dateTime('dt_hr_solicitacao');
            $table->text('de_observacao');

            $table->timestamps();

            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_area_comum')->references('id_area_comum')->on('area_comums')->onDelete('cascade');
            $table->foreign('id_area_pai')->references('id_area_pai')->on('area_pais')->onDelete('cascade');
            $table->foreign('id_tipo_area')->references('id_tipo_area')->on('tipo_areas')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('reservas');
	}

}

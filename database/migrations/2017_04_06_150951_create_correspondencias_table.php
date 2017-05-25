<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrespondenciasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correspondencias', function(Blueprint $table) {
            $table->increments('id_correspondencia');
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->string('de_remetente',100)->nullable();
            $table->dateTime('dt_hr_chegada')->nullable();
            $table->dateTime('dt_hr_entrega')->nullable();
            $table->string('de_recebedor',100)->nullable();
            $table->char('st_entregue',1)->nullable();
            $table->text('de_observacao')->nullable();

            $table->timestamps();

            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('correspondencias');
	}

}

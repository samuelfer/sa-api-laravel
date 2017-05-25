<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeituraGasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leitura_gas', function(Blueprint $table) {
            $table->increments('id_leitura');
            $table->integer('id_consumo')->unsigned();
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->decimal('vl_leitura',10,2);
            $table->decimal('vl_consumo_kg', 10,2);
            $table->decimal('vl_consumo',10,2);
            $table->decimal('vl_total',10,2);
            $table->date('dt_leitura');

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
		Schema::drop('leitura_gas');
	}

}

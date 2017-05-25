<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsumoGasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consumo_gas', function(Blueprint $table) {
            $table->increments('id_consumo');
            $table->date('dt_lancamento');
            $table->date('dt_leitura');
            $table->decimal('coeficiente',10,2);
            $table->decimal('vl_quilo',10,2);
            $table->decimal('vl_taxa',10,2);
            $table->date('mes_ano');
            $table->smallInteger('id_condominio')->unsigned();

            $table->timestamps();

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
		Schema::drop('consumo_gas');
	}

}

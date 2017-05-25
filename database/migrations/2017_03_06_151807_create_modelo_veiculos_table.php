<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModeloVeiculosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('modelo_veiculos', function(Blueprint $table) {
            $table->smallIncrements('id_modelo_veiculo');
            $table->string('de_modelo',20);
            $table->smallInteger('id_fabricante')->unsigned();


            $table->timestamps();

            $table->foreign('id_fabricante')->references('id_fabricante')->on('fabricantes')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('modelo_veiculos');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitantesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('visitantes', function(Blueprint $table) {
            $table->increments('id_visitante');
            $table->smallInteger('id_tipo_visitante')->unsigned();
            $table->string('img_visitante',100);
            $table->string('nu_rg',10)->nullable();
            $table->string('nu_cpf',16)->nullable();

            $table->timestamps();

            $table->foreign('id_tipo_visitante')->references('id_tipo_visitante')->on('tipo_visitantes')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('visitantes');
	}

}

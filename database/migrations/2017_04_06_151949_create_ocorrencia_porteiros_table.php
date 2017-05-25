<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaPorteirosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ocorrencia_porteiros', function(Blueprint $table) {
            $table->increments('id_ocorrencia');
            $table->date('dt_hr_ocorrencia');
            $table->text('de_ocorrencia');
            $table->string('login',10);

            $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ocorrencia_porteiros');
	}

}

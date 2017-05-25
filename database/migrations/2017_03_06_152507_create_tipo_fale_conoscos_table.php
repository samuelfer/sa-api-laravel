<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoFaleConoscosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipo_fale_conoscos', function(Blueprint $table) {
            $table->smallIncrements('id_tipo_fale_conosco');
            $table->string('de_tipo_fale_conosco',30);

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
		Schema::drop('tipo_fale_conoscos');
	}

}

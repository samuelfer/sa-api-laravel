<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoMultaNotificacaosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipo_multa_notificacaos', function(Blueprint $table) {
            $table->increments('id_tipo_multa_notificacao');
            $table->string('de_tipo_multa_notificacao',30);

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
		Schema::drop('tipo_multa_notificacaos');
	}

}

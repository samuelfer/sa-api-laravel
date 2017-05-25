<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoPerfilsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tipo_perfils', function(Blueprint $table) {
            $table->smallIncrements('id_tipo_perfil')->unsigned();
            $table->string('de_tipo_perfil',30);
            $table->smallInteger('id_tipo_grupo_perfil')->unsigned();

            $table->timestamps();

            //$table->foreign('id_tipo_grupo_perfil')->references('id_tipo_grupo_perfil')->on('grupo_perfils') ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::drop('tipo_perfils');
	}

}

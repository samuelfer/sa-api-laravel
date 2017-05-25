<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnunciosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('anuncios', function(Blueprint $table) {
            $table->increments('id_anuncio');
            $table->date('dt_anuncio');
            $table->time('hr_anuncio');
            $table->string('de_categoria',20);
            $table->string('de_titulo_anuncio',100);
            $table->string('de_anuncio');
            $table->string('imagem',50)->nullable();
            $table->string('nu_telefone',11)->nullable();
            $table->float('vl_anuncio')->nullable();

            $table->timestamps();

            //$table->foreign('id_categoria')->references('id_categoria')->on('categoria');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('anuncios');
	}

}

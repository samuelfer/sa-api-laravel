<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('animals', function(Blueprint $table) {
            $table->increments('id_animal');
            $table->smallInteger('id_raca')->unsigned();
            $table->smallInteger('id_especie')->unsigned();
            $table->string('img_animal');
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->string('st_vacinado', 1);
            $table->integer('id_pessoa')->unsigned();

            $table->timestamps();

            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_raca')->references('id_raca')->on('racas')->onDelete('cascade');
            $table->foreign('id_especie')->references('id_especie')->on('especies')->onDelete('cascade');
            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('animals');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaragemsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('garagems', function(Blueprint $table) {
            $table->increments('id_garagem');
            $table->integer('id_numero_imovel')->unsigned();
            $table->smallInteger('id_bloco')->unsigned();
            //$table->smallInteger('id_setor')->unsigned();
            $table->string('de_imagem',100)->nullable();

            $table->timestamps();

            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            //$table->foreign('id_setor')->references('id_setor')->on('setors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('garagems');
	}

}

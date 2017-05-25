<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImovelsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imovels', function(Blueprint $table) {
            $table->increments('id_numero_imovel');
            $table->smallInteger('id_bloco')->unsigned();
            $table->smallInteger('id_tipo_situacao')->unsigned();
            $table->integer('de_metragem_imovel');
            $table->string('de_observacao_imovel');
            $table->integer('id_proprietario')->unsigned();
            $table->string('usuario',32);

            $table->timestamps();

            $table->foreign('id_bloco')->references('id_bloco')->on('blocos');
            $table->foreign('id_tipo_situacao')->references('id_tipo_situacao')->on('tipo_situacaos')->onDelete('cascade');
            //$table->foreign('id_proprietario')->references('id_proprietario')->on('proprietarios')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//Schema::dropIfExists('imovels');
	}

}

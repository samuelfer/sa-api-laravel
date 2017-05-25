<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChavesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('chaves', function(Blueprint $table) {
            $table->smallIncrements('id_chaves')->autoincrements();
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->smallInteger('id_tipo_chave')->unsigned();
            $table->integer('id_morador')->unsigned();
            $table->dateTime('dt_hr_entrada_chaves');
            $table->dateTime('dt_hr_saida_chaves');
            $table->text('de_observacao');

            $table->timestamps();

            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_tipo_chave')->references('id_tipo_chave')->on('tipo_chaves')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('chaves');
	}

}

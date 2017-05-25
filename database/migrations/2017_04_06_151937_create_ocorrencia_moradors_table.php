<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOcorrenciaMoradorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ocorrencia_moradors', function(Blueprint $table) {
            $table->increments('id_ocorrencia_morador');
            $table->integer('id_morador');
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->smallInteger('id_tipo_ocorrencia')->unsigned();
            $table->dateTime('dt_hr_ocorrencia');
            $table->text('de_ocorrencia')->nullable();
            $table->string('img_ocorrencia',100)->nullable();
            $table->string('nu_placa',7)->nullable();
            $table->string('de_marca_modelo',100)->nullable();
            $table->char('st_visto',1);
            $table->text('feedback')->nullable();
            $table->integer('id_ocorrencia_relacionada')->nullable();
            $table->text('de_observacao')->nullable();

            $table->timestamps();

            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_tipo_ocorrencia')->references('id_tipo_ocorrencia')->on('tipo_ocorrencias')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ocorrencia_moradors');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaleConoscosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fale_conoscos', function(Blueprint $table) {
            $table->increments('id_fale_conosco');
            $table->date('dt_mensagem');
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->smallInteger('id_tipo_fale_conosco')->unsigned();
            $table->string('email',64);
            $table->text('de_mensagem');
            $table->char('st_visto',1);
            $table->text('feedback')->nullable();
            $table->string('telefone',11);
            $table->char('st_ticket',1);
            $table->date('dt_ultima_mensagem')->nullable();


            $table->timestamps();

            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_tipo_fale_conosco')->references('id_tipo_fale_conosco')->on('tipo_fale_conoscos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fale_conoscos');
	}

}

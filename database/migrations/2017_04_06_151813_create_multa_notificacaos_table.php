<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultaNotificacaosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multa_notificacaos', function(Blueprint $table) {
            $table->increments('id_multa_notificacao');
            $table->smallInteger('id_condominio')->unsigned();
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->integer('id_pessoa')->unsigned();
            $table->smallInteger('id_tipo_multa_notificacao');
            $table->string('de_multa_notificacao',80);
            $table->dateTime('dt_multa_notificacao');
            $table->decimal('vl_multa_notificacao',10,2);
            $table->string('de_vl_multa_notificacao',100)->nullable();
            $table->char('st_liquidado',1);
            $table->text('de_observacao')->nullable();
            $table->text('de_conduta')->nullable();

            $table->timestamps();

            $table->foreign('id_condominio')->references('id_condominio')->on('condominios')->onDelete('cascade');
            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
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
		Schema::drop('multa_notificacaos');
	}

}

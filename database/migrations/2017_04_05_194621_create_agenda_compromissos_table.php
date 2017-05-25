<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgendaCompromissosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agenda_compromissos', function(Blueprint $table) {
            $table->increments('id_agenda');
            $table->date('dt_cadastro');
            $table->date('dt_agenda');
            $table->string('st_notificacao',1);
            $table->string('de_responsavel');
            $table->string('de_titulo_tarefa');
            $table->string('de_tarefa');
            $table->string('st_status',1);
            $table->integer('nu_qtde_dias');
            $table->string('de_acao');


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
		Schema::drop('agenda_compromissos');
	}

}

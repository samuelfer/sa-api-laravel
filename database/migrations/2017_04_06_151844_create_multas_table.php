<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultasTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multas', function(Blueprint $table) {
            $table->increments('id_multa');
            $table->integer('id_multa_notificacao')->unsigned();
            $table->dateTime('dt_hr_constatacao')->nullable();
            $table->string('de_testemunha',100)->nullable();

            $table->timestamps();

            $table->foreign('id_multa_notificacao')->references('id_multa_notificacao')->on('multa_notificacaos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('multas');
	}

}

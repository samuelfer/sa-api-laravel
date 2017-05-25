<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackFaleConoscosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('feedback_fale_conoscos', function(Blueprint $table) {
            $table->increments('id_feedback');
            $table->integer('id_fale_conosco')->unsigned();
            $table->text('de_mensagem');
            $table->string('login',10)->nullable;
            $table->date('dt_mensagem');

            $table->timestamps();

            $table->foreign('id_fale_conosco')->references('id_fale_conosco')->on('fale_conoscos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('feedback_fale_conoscos');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avisos', function(Blueprint $table) {
            $table->increments('id_aviso');
            $table->date('dt_aviso');
            $table->text('de_aviso');
            $table->string('arq_aviso',100);


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
		Schema::drop('avisos');
	}

}

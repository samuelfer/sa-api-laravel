<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegLogsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seg_logs', function(Blueprint $table) {
            $table->increments('id');
            $table->dateTime('inserted_date');
            $table->string('username',90);
            $table->string('application', 200);
            $table->string('creator',30);
            $table->string('ip_user',32);
            $table->string('action',30);
            $table->text('description');


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
		Schema::dropIfExists('seg_logs');
	}

}

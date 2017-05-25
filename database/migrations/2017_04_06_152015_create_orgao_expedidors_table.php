<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrgaoExpedidorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orgao_expedidors', function(Blueprint $table) {
            $table->increments('id_orgao_expedidor');
            $table->string('de_orgao_expedidor',70);
            $table->string('de_sigla',6);

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
		Schema::drop('orgao_expedidors');
	}

}

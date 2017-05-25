<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArecebersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('arecebers', function(Blueprint $table) {
            $table->increments('id_areceber');
            $table->string('nu_documento',20);
            $table->date('dt_pagamento');
            $table->date('dt_vencimento');
            $table->decimal('nu_juros',10,2)->nullable();
            $table->decimal('vl_multa',10,2)->nullable();
            $table->decimal('valor',10,2);
            $table->decimal('vl_total',10,2);
            $table->char('st_pago',1);


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
		Schema::drop('arecebers');
	}

}

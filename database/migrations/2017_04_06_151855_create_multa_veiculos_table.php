<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMultaVeiculosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('multa_veiculos', function(Blueprint $table) {
            $table->increments('id_multa_veiculo');
            $table->integer('id_multa_notificacao')->unsigned();
            $table->date('dt_hr_trava')->nullable();
            $table->date('dt_hr_destrava')->nullable();
            $table->string('nu_placa',7);

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
		Schema::drop('multa_veiculos');
	}

}

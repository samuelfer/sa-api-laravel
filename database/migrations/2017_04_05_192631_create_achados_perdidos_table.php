<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchadosPerdidosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('achados_perdidos', function(Blueprint $table) {
            $table->increments('id_achados_perdidos');
            $table->integer('id_numero_imovel')->unsigned();
            $table->smallInteger('id_bloco')->unsigned();
            $table->string('de_local')->nullable();
            $table->string('de_item')->nullable();
            $table->date('dt_achados_perdidos');
            $table->string('img_item',100)->nullable();
            $table->string('st_item',1);
            $table->string('de_perdeu')->nullable();
            $table->integer('id_funcionario')->nullable();
            $table->integer('id_morador')->nullable();
            $table->string('st_entregue',1);
            $table->date('dt_entrega')->nullable();
            $table->time('hr_entrega')->nullable();

            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');

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
		Schema::dropIfExists('achados_perdidos');
	}

}

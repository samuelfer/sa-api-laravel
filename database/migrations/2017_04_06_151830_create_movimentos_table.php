<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('movimentos', function(Blueprint $table) {
            $table->increments('id_movimento');
            $table->integer('nu_conta');
            $table->integer('nu_agencia');
            $table->integer('id_fornecedor')->unsigned();
            $table->smallInteger('id_tipo_documento')->unsigned();
            $table->smallInteger('id_tipo_movimento')->unsigned();
            $table->date('dt_movimento');
            $table->integer('nu_documento')->nullable();
            $table->decimal('vl_movimento',10,2);

            $table->timestamps();

            $table->foreign('id_fornecedor')->references('id_fornecedor')->on('fornecedors')->onDelete('cascade');
            $table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documentos')->onDelete('cascade');
            $table->foreign('id_tipo_movimento')->references('id_tipo_movimento')->on('tipo_movimentos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('movimentos');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContaCorrentesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conta_correntes', function(Blueprint $table) {
            $table->string('nu_conta',10)->unique();
            $table->string('nu_agencia',10);
            $table->smallInteger('id_banco')->unsigned();
            $table->smallInteger('id_condominio')->unsigned();
            $table->smallInteger('id_tipo_conta')->unsigned();
            $table->decimal('nu_valor',10,2);

            $table->timestamps();

            $table->foreign('id_banco')->references('id_banco')->on('bancos')->onDelete('cascade');
            $table->foreign('id_condominio')->references('id_condominio')->on('condominios')->onDelete('cascade');
            $table->foreign('id_tipo_conta')->references('id_tipo_conta')->on('tipo_contas')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conta_correntes');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFornecedorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fornecedors', function(Blueprint $table) {
            $table->increments('id_fornecedor');
            $table->integer('id_pessoa')->unsigned();
            $table->date('dt_cadastro');
            $table->string('de_razao_social',100)->nullable();


            $table->timestamps();

            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fornecedors');
	}

}

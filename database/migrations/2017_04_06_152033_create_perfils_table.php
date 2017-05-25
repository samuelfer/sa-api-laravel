<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('perfils', function(Blueprint $table) {
		    $table->engine ='InnoDB';
            $table->increments('id_perfil');
            $table->integer('id_pessoa')->unsigned();
            $table->smallInteger('id_tipo_perfil')->unsigned();
            $table->date('dt_inicio')->nullable();
            $table->date('dt_fim')->nullable();
            $table->char('st_status',1);

            $table->timestamps();

            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas')->onDelete('cascade');
            $table->foreign('id_tipo_perfil')->references('id_tipo_perfil')->on('tipo_perfils')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('perfils');
	}

}

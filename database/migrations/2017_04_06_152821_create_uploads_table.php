<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('uploads', function(Blueprint $table) {
            $table->increments('id_upload');
            $table->smallInteger('id_tipo_upload')->unsigned();
            $table->date('dt_upload');
            $table->string('arquivo',100);
            $table->string('de_descricao',100);
            $table->char('permissao',1);

            $table->timestamps();

            $table->foreign('id_tipo_upload')->references('id_tipo_upload')->on('tipo_uploads')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('uploads');
	}

}

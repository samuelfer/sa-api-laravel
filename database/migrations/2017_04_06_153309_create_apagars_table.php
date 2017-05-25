<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApagarsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('apagars', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id_apagar');
            $table->integer('id_fornecedor');
            $table->integer('id_tipo_documento')->unsigned();
            //$table->foreign('id_tipo_documento')->references('id_tipo_documento')->on('tipo_documentos');
            $table->date('dt_data');
            $table->integer('nu_documento');
            $table->date('dt_vencimento');
            $table->decimal('nu_valor', 10, 2)->nullable();
            $table->integer('nu_jurus')->nullable();
            $table->decimal('nu_multa', 10, 2)->nullable();
            $table->decimal('nu_valor_pago', 10, 2)->nullable();
            $table->char('st_liquidado',1);


            $table->timestamps();
		});

//        Schema::table('apagars', function(Blueprint $table)
//        {
//            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos')->onDelete('cascade');
//        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('apagars');
	}

}

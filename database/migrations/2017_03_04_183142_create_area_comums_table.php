<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaComumsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
    {
        Schema::create('area_comums', function (Blueprint $table) {
            $table->smallIncrements('id_area_comum');
            $table->smallInteger('id_area_pai')->unsigned();
            $table->smallInteger('id_tipo_area')->unsigned();
            $table->string('de_cadastro_reserva_area_comum');
            $table->string('de_materiais');
            $table->float('nu_valor');
            $table->time('hr_inicio');
            $table->time('hr_fim');
            $table->integer('tmp_duracao');
            $table->string('st_horario_sn');
            $table->string('ignora_qtd_reserva');
            $table->integer('nu_antecedencia_max');
            $table->integer('nu_antecedencia_min');
            $table->integer('qtd_reserva_mes');
            $table->string('perm_varias_reserva_dia');
            $table->integer('qtd_reserva_mes_gratis');
            $table->integer('qtd_reserva_ano_gratis');

            $table->timestamps();

            $table->foreign('id_area_pai')->references('id_area_pai')->on('area_pais')->onDelete('cascade');
            $table->foreign('id_tipo_area')->references('id_tipo_area')->on('tipo_areas')->onDelete('cascade');
        });

    }


    /**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('area_comums');
	}

}

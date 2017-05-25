<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVeiculoMoradorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('veiculo_moradors', function(Blueprint $table) {
            $table->increments('id_veiculo_morador');
            $table->string('nu_placa',7);
            $table->smallInteger('id_bloco')->unsigned();
            $table->integer('id_numero_imovel')->unsigned();
            $table->integer('id_pessoa')->unsigned();
            $table->smallInteger('id_modelo_veiculo')->unsigned();
            $table->string('de_vaga_veiculo',15)->nullable();
            $table->string('de_cadastro_veiculo_cidade',50)->nullable();
            $table->char('de_cadastro_veiculo_uf',2)->nullable();
            $table->string('im_cadastro_veiculo_imagem',100)->nullable();
            $table->string('de_linha',20)->nullable();
            $table->date('dt_linha')->nullable();
            $table->date('dt_fabricacao')->nullable();
            $table->string('de_cor',15)->nullable();
            $table->char('st_ativo',1);
            $table->date('dt_inativacao')->nullable();

            $table->timestamps();

            $table->foreign('id_bloco')->references('id_bloco')->on('blocos')->onDelete('cascade');
            $table->foreign('id_numero_imovel')->references('id_numero_imovel')->on('imovels')->onDelete('cascade');
            $table->foreign('id_pessoa')->references('id_pessoa')->on('pessoas')->onDelete('cascade');
            $table->foreign('id_modelo_veiculo')->references('id_modelo_veiculo')->on('modelo_veiculos')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('veiculo_moradors');
	}

}

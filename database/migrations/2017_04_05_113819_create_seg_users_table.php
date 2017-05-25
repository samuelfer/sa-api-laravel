<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seg_users', function(Blueprint $table) {
            $table->string('login',32)->unique();
            $table->string('pswd',32);
            $table->string('name',64);
            $table->string('email',64);
            $table->string('email_alt');
            $table->string('telefone',11);
            $table->string('telefone_alt',11);
            $table->char('recebe_sms',1)->nullable();
            $table->char('active',1)->nullable();
            $table->char('activation_code',1)->nullable();
            $table->char('priv_admin',1)->nullable();
            $table->char('recebe_email',1)->nullable();
            $table->char('recebe_email_achados_perdidos',1)->nullable();
            $table->char('st_veiculo',1)->nullable();
            $table->char('st_aviso',1)->nullable();

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
		Schema::dropIfExists('seg_users');
	}

}

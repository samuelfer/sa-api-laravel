<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('login',32)->unique();
            $table->string('password');
            $table->string('name',64);
            $table->string('email',64)->unique();
            $table->string('email_alt');
            $table->string('telefone',11);
            $table->string('telefone_alt',11);
            $table->char('recebe_sms',1);
            $table->char('active',1);
            $table->char('activation_code',1);
            $table->char('priv_admin',1);
            $table->char('recebe_email',1);
            $table->char('recebe_email_achados_perdidos',1);
            $table->char('st_veiculo',1);
            $table->char('st_aviso',1);

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

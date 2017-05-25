<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSegGroupsAppsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('seg_groups_apps', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->integer('seg_apps_id')->unsigned();
            $table->string('priv_access',1);
            $table->string('priv_insert',1);
            $table->string('priv_delete',1);
            $table->string('priv_update',1);
            $table->string('priv_export',1);
            $table->string('priv_print',1);

            $table->foreign('seg_apps_id')->references('id')->on('seg_apps');


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
		Schema::dropIfExists('seg_groups_apps');
	}

}

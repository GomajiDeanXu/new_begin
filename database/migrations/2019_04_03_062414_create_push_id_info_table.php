<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePushIdInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('push_id_info', function(Blueprint $table)
		{
			$table->integer('push_id', true);
			$table->boolean('type')->default(0)->index('idx_type')->comment('1: gm
2: 4300');
			$table->integer('create_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('push_id_info');
	}

}

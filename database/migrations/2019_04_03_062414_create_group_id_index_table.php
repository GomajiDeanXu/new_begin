<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupIdIndexTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_id_index', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('index_id')->default(0)->index('idx_index_id')->comment('辨識ID');
			$table->integer('create_ts')->default(0)->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_id_index');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateScheduleControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('schedule_control', function(Blueprint $table)
		{
			$table->string('db_name', 45)->nullable()->default('');
			$table->string('table_name', 45)->nullable()->default('')->index('idx_table_name');
			$table->integer('auto_id')->default(0);
			$table->boolean('type')->default(0);
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
		Schema::drop('schedule_control');
	}

}

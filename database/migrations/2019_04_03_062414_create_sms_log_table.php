<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sms_log', function(Blueprint $table)
		{
			$table->integer('log_id', true);
			$table->integer('sms_cycle')->default(0);
			$table->integer('type')->default(0);
			$table->integer('src')->default(0);
			$table->integer('status')->default(0);
			$table->integer('number')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sms_log');
	}

}

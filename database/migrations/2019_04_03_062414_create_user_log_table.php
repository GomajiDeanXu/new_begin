<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_log', function(Blueprint $table)
		{
			$table->integer('log_id', true);
			$table->integer('gm_uid')->default(0);
			$table->string('reg_mobile_phone', 45)->default('0');
			$table->integer('account_active')->default(0);
			$table->integer('register_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_log');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateResetPasswordLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reset_password_log', function(Blueprint $table)
		{
			$table->increments('log_id');
			$table->integer('gm_uid')->unsigned()->default(0);
			$table->boolean('type')->default(0)->comment('1: 發送重設密碼信 / 2: 點擊重設密碼連結');
			$table->string('ip', 15)->nullable()->comment('來源的 IP');
			$table->integer('log_ts')->unsigned()->default(0)->comment('記錄到的時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reset_password_log');
	}

}

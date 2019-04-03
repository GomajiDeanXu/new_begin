<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sms', function(Blueprint $table)
		{
			$table->integer('sms_id', true)->comment('簡訊數量控制ID');
			$table->integer('sms_ts')->default(0)->index('sms_ts')->comment('簡訊時間');
			$table->string('sms_source', 45)->index('sms_source')->comment('簡訊來源');
			$table->integer('status')->default(0)->index('status')->comment('狀態(0: 預設 / 1: 發送成功 / 2: 發送失敗)');
			$table->integer('type')->default(0)->index('type')->comment('簡訊類型(0: 預設 / 1: 遠傳 / 2: EVERY8D)');
			$table->integer('src')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sms');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppPushTokenTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_push_token', function(Blueprint $table)
		{
			$table->increments('token_id');
			$table->string('device', 12)->index('idx_device');
			$table->integer('city_id')->index('idx_city_id');
			$table->string('deviceToken')->index('idx_deviceToken');
			$table->boolean('badge')->default(0);
			$table->integer('ts')->unsigned();
			$table->boolean('flag')->default(1)->index('idx_flag');
			$table->integer('update_ts')->unsigned()->default(0)->comment('用來記錄最後更新時間');
			$table->boolean('type')->default(0)->index('idx_type')->comment('類型，目前用於Android 0 old(C2DM), 1 new(GCM)');
			$table->string('device_id')->nullable()->default('')->index('idx_device_id')->comment('裝置唯一識別編號');
			$table->boolean('ch')->default(0)->comment('頻道編號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_push_token');
	}

}

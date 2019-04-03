<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_info', function(Blueprint $table)
		{
			$table->increments('promotion_code_id')->comment('系統流水號');
			$table->integer('gm_uid')->unsigned()->default(0)->index('idx_gm_uid')->comment('會員gm_uid');
			$table->integer('points')->default(0)->comment('會員點數');
			$table->string('promotion_code', 7)->default('')->index('idx_promotion_code')->comment('邀請碼');
			$table->integer('num_promotes')->default(0)->comment('推薦次數');
			$table->integer('create_ts')->default(0)->comment('建立日期時間');
			$table->integer('modify_ts')->default(0)->comment('修改時間');
			$table->boolean('status')->default(1)->index('idx_status')->comment('狀態（1=有效，0＝停權）');
			$table->string('sk', 32)->nullable()->comment('與 Server 傳輸資料時加密用的 key');
			$table->string('access_token', 40)->nullable();
			$table->integer('signup_ts')->unsigned()->default(0)->comment('最後一次驗證時間');
			$table->boolean('level')->default(1)->comment('會員等級');
			$table->boolean('auth_status')->default(1)->comment('0: 等待驗證 / 1: 驗證成功 / 2: 停用');
			$table->boolean('app_id')->default(2)->comment('認證的 App (1: GOMAJICARD, 2: GOMAJI)');
			$table->integer('device_serial')->unsigned()->default(0)->index('idx_device_serial')->comment('m4300.device.device_serial');
			$table->integer('addup_money')->default(0)->comment('總消費金額');
			$table->integer('bflag')->unsigned()->default(0)->comment('1: 已綁卡/ 2: 可使用全家條碼付款');
			$table->integer('neg_points')->default(0)->comment('負向點數(待扣回)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_info');
	}

}

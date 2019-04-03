<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPcodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_pcode', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('gm_uid')->default(0);
			$table->integer('share_id')->default(0)->comment('成功分享的 gm_uid');
			$table->string('pcode', 11)->default('')->index('idx_pcode')->comment('得到的麻吉券號碼');
			$table->integer('got_ts')->default(0)->comment('時間');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('暫訂 1:分享 / 2:推薦 / 3:客服加 / 4:付費 / 5:活動(抽獎) / 6: 退費 / 99:刪除');
			$table->string('memo', 128)->default('')->comment('備註');
			$table->string('service_id', 32)->default('')->comment('發送PCODE的帳號ID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_pcode');
	}

}

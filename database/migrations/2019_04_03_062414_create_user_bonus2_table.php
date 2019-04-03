<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserBonus2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_bonus2', function(Blueprint $table)
		{
			$table->integer('bonus_id', true);
			$table->bigInteger('gm_uid')->index('idx_gm_uid');
			$table->integer('bonus_point')->nullable()->comment('本次事件增加或減少的點數');
			$table->integer('share_id')->nullable()->comment('因分享其他 gm_uid ，因而獲得點數之來源 gm_uid');
			$table->integer('got_ts')->nullable()->comment('時間');
			$table->boolean('flag')->nullable()->comment('暫訂 1:分享 / 2:推薦 / 3:客服加 / 4:付費');
			$table->string('memo', 128)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_bonus2');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserWithdrawLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_withdraw_log', function(Blueprint $table)
		{
			$table->integer('withdraw_id', true);
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->integer('bonus_id')->default(0)->index('idx_bonus_id')->comment('團購金退現的bonus_id');
			$table->integer('qid')->default(0)->comment('退現申請編號(deal_ququ.qid)');
			$table->integer('create_ts')->default(0)->index('idx_got_ts')->comment('轉出、入時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('標記 [ 0:刪除 / 1:有效]');
			$table->integer('refund_point')->default(0)->comment('退費金額');
			$table->integer('batch_id')->default(0)->index('idx_batch_id')->comment('團購金退現bonus_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_withdraw_log');
	}

}

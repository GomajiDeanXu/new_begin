<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappPurchasesRewardPointDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_purchases_reward_point_detail', function(Blueprint $table)
		{
			$table->increments('prpd_id')->comment('系統流水號');
			$table->integer('prp_id')->unsigned()->comment('gomaji.oneapp_purchases_reward_point.sys_id');
			$table->integer('purchase_id')->unsigned()->default(0)->index('idx_purchase_id')->comment('交易序號');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('兌換券id');
			$table->integer('re_id')->unsigned()->default(0)->index('idx_re_id')->comment('活動id');
			$table->integer('points')->unsigned()->default(0)->comment('預計可獲贈點');
			$table->integer('create_ts')->unsigned()->default(0)->comment('取得日期時間');
			$table->integer('modify_ts')->unsigned()->default(0)->comment('修改日期時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態  1=未贈，2=已贈');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_purchases_reward_point_detail');
	}

}

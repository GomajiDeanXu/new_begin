<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappPurchasesRewardPointTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_purchases_reward_point', function(Blueprint $table)
		{
			$table->increments('sys_id')->comment('系統流水號');
			$table->boolean('trans_type')->default(0)->index('idx_trans_type')->comment('交易來源 1=OTA或團購，2=BB或買單優惠，3=生活市集');
			$table->integer('purchase_id')->unsigned()->default(0)->index('idx_purchase_id')->comment('交易序號');
			$table->integer('filter_id')->default(0)->comment('gid/pid');
			$table->integer('gm_uid')->unsigned()->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->integer('re_id')->unsigned()->default(0)->index('idx_re_id')->comment('活動id');
			$table->integer('create_ts')->unsigned()->default(0)->comment('取得日期時間');
			$table->integer('modify_ts')->unsigned()->default(0)->comment('修改日期時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態  1=有效，2=取消，3=待生效');
			$table->boolean('filterid_type')->nullable()->default(3)->comment('1: filter_id=sid,2:filter_id=gid,3:filter_id=pid');
			$table->boolean('point_type')->default(1)->comment('1=指定點數,2=百分比 (oneapp_waitting_points.point_type)');
			$table->float('get_points', 11, 4)->default(0.0000)->comment('贈點的點數或百分比 (oneapp_waitting_points.get_points)');
			$table->integer('group_id')->default(0)->comment('分店編號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_purchases_reward_point');
	}

}

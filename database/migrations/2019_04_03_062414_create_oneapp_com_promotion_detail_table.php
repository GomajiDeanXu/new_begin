<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappComPromotionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_com_promotion_detail', function(Blueprint $table)
		{
			$table->increments('cmd_id')->comment('系統流水號');
			$table->integer('re_id')->unsigned()->default(0)->index('idx_re_id')->comment('活動系統流水號');
			$table->integer('gm_uid_a')->unsigned()->default(0)->index('idx_uid_a')->comment('被推薦人uid');
			$table->string('gm_uid_a_mobile', 10)->default('')->index('dx_gm_uid_a_mobile')->comment('被推薦人所使用的手機號碼');
			$table->integer('cpc_id')->unsigned()->default(0)->index('idx_cpc_id')->comment('企業優惠碼系統流水號');
			$table->string('promotion_code', 10)->default('0')->index('idx_procomotion_code')->comment('優惠碼');
			$table->integer('create_ts')->default(0)->comment('輸入優惠碼的日期時間');
			$table->integer('gid')->unsigned()->default(0)->index('idx_gid')->comment('企業gid');
			$table->boolean('gid_point_flag')->default(0)->index('idx_gid_point_flag')->comment('企業gid是否已領取');
			$table->integer('new_new_trans_ts')->default(0)->comment('被推薦人首消的日期時間');
			$table->boolean('trans_type')->default(0)->index('idx_trans_type')->comment('交易表來源 1=團購或ＯＴＡ，2=買單優惠');
			$table->integer('purchase_id')->unsigned()->default(0)->index('idx_purchase_id')->comment('transaction.user_purchases.purchase_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_com_promotion_detail');
	}

}

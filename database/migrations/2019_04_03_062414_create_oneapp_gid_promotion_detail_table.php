<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappGidPromotionDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_gid_promotion_detail', function(Blueprint $table)
		{
			$table->increments('gmd_id')->comment('系統流水號');
			$table->integer('re_id')->unsigned()->default(0)->index('idx_re_id')->comment('活動系統流水號');
			$table->integer('gm_uid_a')->unsigned()->default(0)->index('idx_uid_a')->comment('被推薦人uid');
			$table->string('gm_uid_a_mobile', 10)->default('')->index('dx_gm_uid_a_mobile')->comment('被推薦人所使用的手機號碼');
			$table->string('promotion_code', 10)->default('0')->index('idx_procomotion_code')->comment('優惠碼');
			$table->integer('create_ts')->default(0)->comment('輸入優惠碼的日期時間');
			$table->integer('gid')->unsigned()->default(0)->index('idx_gid')->comment('商店gid');
			$table->boolean('gid_point_flag')->default(0)->index('idx_gid_point_flag')->comment('商店gid是否已領取');
			$table->integer('new_new_trans_ts')->default(0)->comment('被推薦人首消的日期時間');
			$table->boolean('trans_type')->default(0)->index('idx_trans_type')->comment('交易表來源 1=團購或ＯＴＡ，2=買單優惠');
			$table->integer('purchase_id')->unsigned()->default(0)->index('idx_purchase_id')->comment('transaction.user_purchases.purchase_id');
			$table->integer('finance_id')->default(0)->comment('店家請款ID(mpay.finance_promotes.finance_id)');
			$table->integer('refund_finance_id')->default(0)->comment('店家負項款ID(mpay.finance_promotes.finance_id)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_gid_promotion_detail');
	}

}

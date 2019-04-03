<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappMgmDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_mgm_detail', function(Blueprint $table)
		{
			$table->increments('md_id')->comment('系統流水號');
			$table->integer('re_id')->unsigned()->default(0)->index('idx_re_id')->comment('活動系統流水號');
			$table->boolean('type')->default(0)->index('idx_type')->comment('類別(1=MGM，4=企業優惠碼)');
			$table->integer('gm_uid_a')->unsigned()->default(0)->index('idx_uid_a')->comment('被推薦人uid');
			$table->string('gm_uid_a_mobile', 10)->default('')->index('idx_gm_uid_a_mobile')->comment('被推薦人所使用的手機號碼');
			$table->integer('promotion_code_id')->unsigned()->default(0)->index('idx_mgm_code')->comment('MGM優惠碼ID');
			$table->integer('create_ts')->default(0)->comment('輸入優惠碼的日期時間');
			$table->integer('gm_uid_b')->unsigned()->default(0)->index('idx_uid_b')->comment('推薦人uid');
			$table->boolean('gm_uid_b_point_flag')->default(0)->index('idx_uid_b_point_flag')->comment('推薦人是否已領取');
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
		Schema::drop('oneapp_mgm_detail');
	}

}

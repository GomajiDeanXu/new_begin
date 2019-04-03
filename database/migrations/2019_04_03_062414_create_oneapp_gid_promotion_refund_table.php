<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappGidPromotionRefundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_gid_promotion_refund', function(Blueprint $table)
		{
			$table->increments('gpr_id')->comment('系統流水號');
			$table->integer('gid')->default(0)->index('idx_gid')->comment('店家 gid (branch_id)');
			$table->boolean('trans_type')->default(0)->comment('交易類別(1=團購或OTA   2=BB或買單優惠)');
			$table->integer('refund_purchase_id')->default(0)->comment('訂單序號');
			$table->integer('deal_ts')->default(0)->comment('交易日期時間');
			$table->integer('refund_ts')->default(0)->index('idx_refund_ts')->comment('退費日期時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態 （1=退費中要追回回饋金，2=已處理追回回饋金）');
			$table->index(['trans_type','refund_purchase_id'], 'idx_trans');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_gid_promotion_refund');
	}

}

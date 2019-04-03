<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaStoreFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ota_store_finance', function(Blueprint $table)
		{
			$table->integer('sf_id', true)->comment('店家請款ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店 ID (對應 gomaji.store_branch_total.branch_id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->integer('publish_ts')->default(0)->index('idx_publish_ts')->comment('上架日');
			$table->string('invoice_id', 45)->index('idx_invoice_id')->comment('店家統編');
			$table->boolean('invoice_type')->default(0)->comment('店家請款方式');
			$table->integer('sale_number')->default(0)->comment('銷售份數');
			$table->integer('verify_number')->default(0)->comment('核銷份數');
			$table->integer('refund_number')->default(0)->comment('退費份數');
			$table->integer('money_sell')->default(0)->comment('銷售總額');
			$table->integer('money_verify')->default(0)->comment('核銷總額');
			$table->integer('money_refund')->default(0)->comment('退費總額');
			$table->integer('money_cancel')->default(0)->comment('解約扣款總額');
			$table->integer('money_split')->default(0)->comment('店家應開立發票/收據金額');
			$table->integer('money_split_gm')->default(0)->comment('GOMAJI手續費');
			$table->integer('money')->default(0)->comment('總金額');
			$table->integer('amount')->default(0)->comment('現金');
			$table->integer('bonus')->default(0)->comment('團購金');
			$table->integer('pcode')->default(0)->comment('麻吉券');
			$table->integer('discount')->default(0)->comment('折扣');
			$table->integer('points')->default(0)->comment('點數');
			$table->integer('discount_points')->default(0)->comment('現抵點數(折價序號)');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('建立時間');
			$table->integer('close_ts')->default(0)->index('idx_close_ts')->comment('結案時間');
			$table->integer('start_ts')->default(0)->comment('結帳區間(起)');
			$table->integer('end_ts')->default(0)->comment('結帳區間(訖)');
			$table->integer('inv_ts')->default(0)->comment('發票開立日期');
			$table->integer('discount_ts')->default(0)->comment('折讓單開立日期');
			$table->string('memo')->nullable()->comment('備註');
			$table->string('memo2')->nullable()->comment('備註2(異動備註:狀態_異動者id_異動時間)');
			$table->integer('flag')->default(0)->index('idx_flag')->comment('店家請款狀態
0:刪除
1:正常
2:結案');
			$table->integer('b_flag')->default(0)->index('idx_b_flag')->comment('撥款狀態(同 transaction.store_finance.b_flag)');
			$table->integer('type')->default(1)->index('idx_type')->comment('資料類型(1:OTA(自銷自結)2:OTA(自銷自結解約))');
			$table->integer('trust_flag')->default(1)->index('idx_trust_flag');
			$table->integer('b_flag_ts')->default(0)->index('idx_b_flag_ts')->comment('最後異動日期');
			$table->integer('in_full')->default(0)->index('idx_in_full');
			$table->integer('allocate_ts')->default(0)->index('idx_allocate_ts')->comment('可撥款日期');
			$table->integer('finish_ts')->default(0)->index('idx_finish_ts')->comment('完成撥款日');
			$table->integer('edi')->default(0)->index('idx_edi')->comment('EDIID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ota_store_finance');
	}

}

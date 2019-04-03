<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreFinanceRangeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_finance_range', function(Blueprint $table)
		{
			$table->integer('sfr_id', true)->comment('店家請款區間ID');
			$table->integer('sf_id')->default(0)->index('sf_id')->comment('店家請款ID');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('branch_id')->default(0)->index('branch_id');
			$table->integer('start_ts')->default(0)->index('start_ts')->comment('區間開始日期');
			$table->integer('end_ts')->default(0)->index('end_ts')->comment('區間結束日期');
			$table->integer('create_ts')->default(0)->index('create_ts')->comment('資料建立日期');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('店家請款狀態
0:舊版 未執行
1:正常
2:新版 預覽
3: 刪除');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_finance_range');
	}

}

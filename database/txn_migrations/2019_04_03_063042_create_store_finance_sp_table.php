<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreFinanceSpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_finance_sp', function(Blueprint $table)
		{
			$table->integer('sfsp_id', true)->comment('請款子方案ID');
			$table->integer('sf_id')->default(0)->index('sf_id')->comment('店家請款ID');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('sp_id')->default(0)->index('sp_id')->comment('子方案ID');
			$table->string('sp_name', 191)->index('sp_name')->comment('子方案名稱');
			$table->integer('sp_price')->default(0)->index('sp_price')->comment('子方案單價');
			$table->integer('sale_number')->default(0)->comment('銷售份數');
			$table->integer('verify_number')->default(0)->comment('核銷份數');
			$table->integer('unverify_number')->default(0)->comment('反核銷份數');
			$table->float('money_sell', 12, 4)->default(0.0000)->comment('銷貨總額');
			$table->float('money_split', 12, 4)->default(0.0000)->comment('店家應開立發票/收據金額');
			$table->integer('type')->default(0)->comment('資料類型(1:SH收付款資料2:LB收付款資料3:ES_GA收付款資料4:ES_HA付款資料5:ES_HA請款資料6:ID收付款資料)');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('requistion_ts')->default(0)->comment('請款時間');
			$table->integer('branch_id')->default(0)->index('branch_id');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('店家請款狀態
0:舊版 未執行
1:正常
2:新版 預覽
3: 刪除');
			$table->integer('sfg_id')->default(0)->index('idx_sfg_id')->comment('store_finance_group.sfg_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_finance_sp');
	}

}

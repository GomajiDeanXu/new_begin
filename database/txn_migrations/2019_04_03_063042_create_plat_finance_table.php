<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('plat_finance', function(Blueprint $table)
		{
			$table->increments('pf_id')->comment('系統流水號');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號，對照 gomaji.plat_info');
			$table->string('plat_order_id', 50)->nullable()->default('')->index('idx_plat_order_id')->comment('平台訂單編號');
			$table->string('payment', 30)->default('')->comment('付費方式');
			$table->integer('total_amount')->default(0)->comment('商品原價');
			$table->integer('plat_rebate')->default(0)->comment('平台回饋 GOMAJI 金額');
			$table->integer('commission_fee')->default(0)->comment('成交手續費');
			$table->integer('card_fee')->default(0)->comment('信用卡手續費');
			$table->integer('seller_voucher')->default(0)->comment('賣家折價');
			$table->integer('refund_amount')->default(0)->comment('退費金額');
			$table->integer('escrow_amount')->default(0)->comment('入賬金額');
			$table->integer('complete_ts')->default(0)->comment('平台訂單完成時間');
			$table->integer('escrow_ts')->default(0)->comment('平台撥款時間');
			$table->integer('date_writeoff')->default(0)->comment('夠麻吉入賬日期');
			$table->timestamp('create_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
			$table->timestamp('modify_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('異動時間');
			$table->dateTime('delete_time')->nullable()->comment('刪除時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('plat_finance');
	}

}

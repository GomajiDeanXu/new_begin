<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatFinanceDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('plat_finance_detail', function(Blueprint $table)
		{
			$table->increments('pfd_id')->comment('系統流水號');
			$table->boolean('plat')->index('idx_plat')->comment('平台類型,對照 gomaji.plat_info');
			$table->string('plat_order_id', 50)->nullable()->default('')->index('idx_plat_order_id')->comment('平台訂單編號');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('user_purchases.purchase_id');
			$table->integer('origin_price')->default(0)->comment('商品原價');
			$table->float('plat_rebate_value', 12, 4)->default(0.0000)->comment('平台回饋 GOMAJI 金額實際值');
			$table->integer('plat_rebate')->default(0)->comment('平台回饋 GOMAJI 金額帳務值');
			$table->float('commission_fee_rate', 12, 4)->default(0.0000)->comment('交易手續費比例，入帳當下 gomaji.plat_info 的值');
			$table->float('commission_fee_value', 12, 4)->default(0.0000)->comment('交易手續費實際值');
			$table->integer('commission_fee')->default(0)->comment('交易手續費帳務值');
			$table->float('card_fee_rate', 12, 4)->default(0.0000)->comment('信用卡手續費比例，入帳當下 gomaji.plat_info 的值');
			$table->float('card_fee_value', 12, 4)->default(0.0000)->comment('信用卡手續費實際值');
			$table->integer('card_fee')->default(0)->comment('信用卡手續費帳務值');
			$table->float('seller_voucher_value', 12, 4)->default(0.0000)->comment('賣場折價實際值');
			$table->integer('seller_voucher')->default(0)->comment('賣場折價賬務值');
			$table->integer('escrow_amount')->default(0)->comment('實際入賬金額');
			$table->float('plat_point', 12, 4)->default(0.0000)->comment('平台點數折抵');
			$table->float('plat_voucher', 12, 4)->default(0.0000)->comment('平台折價');
			$table->integer('date_writeoff')->default(0)->comment('夠麻吉入賬日期');
			$table->integer('refund_date_writeoff')->default(0)->comment('夠麻吉退費入賬日期');
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
		Schema::connection('transaction')->drop('plat_finance_detail');
	}

}

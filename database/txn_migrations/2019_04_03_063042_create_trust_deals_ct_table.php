<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustDealsCtTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_deals_ct', function(Blueprint $table)
		{
			$table->integer('tdid', true);
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('product_sernum');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('price')->default(0)->comment('prices');
			$table->integer('total_money')->default(0);
			$table->integer('amount')->default(0);
			$table->integer('bonus')->default(0);
			$table->integer('pcode')->default(0);
			$table->integer('discount')->default(0);
			$table->date('order_date')->nullable();
			$table->date('order_date')
			->default('0000-00-00')->index('idx_order_date')->change();
			$table->time('order_time')->nullable();
			$table->time('order_time')
			->default('00:00:00')->change();
			$table->string('pay_style', 4)->default('')->index('idx_pay_style')->comment('a:現金 / c:刷卡');
			$table->string('used_style', 3)->default('')->index('idx_used_style')->comment('1:未使用 / 2:已使用 / 3:已作廢');
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_order')->default(0)->index('idx_date_order');
			$table->integer('date_used')->default(0)->index('idx_date_used');
			$table->integer('date_cancel')->default(0)->index('idx_date_cancel');
			$table->string('approve_code', 9)->default('');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->char('coupon_no', 16)->default('')->index('idx_coupon_no')->comment('憑證
coupon.auth_serial+
coupon.auth_code');
			$table->integer('sp_id')->default(0);
			$table->integer('branch_id')->default(0);
			$table->integer('system_time')->default(0)->comment('墨攻核銷執行時間');
			$table->char('confirm_type', 4)->default('')->comment('核銷或作廢類型
0=核銷
1=購物金
2=作廢');
			$table->string('memo')->default('')->index('idx_branch_id');
			$table->boolean('feedback_flag')->default(0);
			$table->boolean('store_sernum')->default(0)->index('idx_store_sernum')->comment('default: 0
LB: 1
ES: 2');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_deals_ct');
	}

}

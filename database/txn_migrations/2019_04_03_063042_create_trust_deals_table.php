<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustDealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_deals', function(Blueprint $table)
		{
			$table->integer('tdid', true);
			$table->string('order_sernum', 20)->default('')->index('idx_order_sernum');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('product_sernum');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('price')->default(0)->comment('prices');
			$table->integer('total_money')->default(0);
			$table->integer('discount')->default(0);
			$table->integer('bonus')->default(0);
			$table->date('order_date')->nullable();
			$table->date('order_date')
			->default('0000-00-00')->index('idx_order_date')->change();
			$table->time('order_time')->nullable();
			$table->time('order_time')
			->default('00:00:00')->change();
			$table->string('pay_style', 4)->default('')->index('idx_pay_style')->comment('a:現金 / c:刷卡');
			$table->string('used_style', 3)->default('')->index('idx_used_style')->comment('1:未使用 / 2:已使用 / 3:已作廢');
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_used')->default(0)->index('idx_date_used');
			$table->integer('date_cancel')->default(0)->index('idx_date_cancel');
			$table->string('approve_code', 9)->default('');
			$table->string('bar_code', 18)->default('')->index('idx_bar_code');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id');
			$table->char('coupon_no', 16)->default('')->index('idx_coupon_no')->comment('憑證
coupon.auth_serial+
coupon.auth_code');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('system_time')->default(0);
			$table->char('confirm_type', 4)->default('');
			$table->string('memo')->default('');
			$table->boolean('feedback_flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_deals');
	}

}

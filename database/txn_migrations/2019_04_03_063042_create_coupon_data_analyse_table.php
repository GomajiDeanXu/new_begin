<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponDataAnalyseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_data_analyse', function(Blueprint $table)
		{
			$table->integer('cd_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->date('date_cycle')->default('0000-00-00')->index('idx_date_cycle')->comment('結帳日期');
			$table->float('sale_money', 12, 4)->default(0.0000)->comment('店家銷售拆分金額');
			$table->float('gm_sale_money', 12, 4)->default(0.0000)->comment('GM銷售拆分金額');
			$table->integer('date_create')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('coupon_data_analyse');
	}

}

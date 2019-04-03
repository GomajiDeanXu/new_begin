<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesBonusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_bonus', function(Blueprint $table)
		{
			$table->integer('sb_id', true);
			$table->integer('city_id')->default(0)->index('idx_city_id');
			$table->integer('sales_id')->default(0)->index('idx_sales_id');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('price')->default(0);
			$table->integer('order_no')->default(0);
			$table->integer('revenue')->default(0);
			$table->float('netrevenue', 12, 4)->default(0.0000);
			$table->integer('amount')->default(0);
			$table->integer('use_bonus')->default(0);
			$table->integer('use_pcode')->default(0);
			$table->integer('refund_no')->default(0);
			$table->integer('refund_revenue')->default(0);
			$table->float('refund_netrevenue', 12, 4)->default(0.0000);
			$table->integer('refund_amount')->default(0);
			$table->integer('refund_bonus')->default(0);
			$table->integer('refund_pcode')->default(0);
			$table->integer('create_ts')->default(0);
			$table->integer('rpt_ts')->default(0)->index('idx_rpt_ts');
			$table->boolean('channel')->default(0)->index('idx_channel');
			$table->boolean('bu')->default(0)->index('bu');
			$table->float('ratio', 4, 4)->default(0.0000);
			$table->integer('sales_bonus')->default(0);
			$table->integer('sales_minus_bonus')->default(0);
			$table->boolean('type')->default(1)->index('idx_type');
			$table->boolean('min_net')->default(0);
			$table->integer('bflag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_bonus');
	}

}

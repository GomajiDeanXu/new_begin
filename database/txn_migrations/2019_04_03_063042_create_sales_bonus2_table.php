<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesBonus2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_bonus2', function(Blueprint $table)
		{
			$table->integer('sb2_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('sales_id')->default(0)->index('idx_sales_id');
			$table->boolean('channel')->default(0)->index('idx_channel');
			$table->integer('price')->default(0);
			$table->integer('order_no')->default(0);
			$table->integer('refund_no')->default(0);
			$table->integer('real_no')->default(0);
			$table->integer('revenue')->default(0);
			$table->float('netrevenue', 12, 4)->default(0.0000);
			$table->boolean('min_net')->default(0);
			$table->integer('create_ts')->default(0);
			$table->integer('rpt_ts')->default(0)->index('idx_rpt_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_bonus2');
	}

}

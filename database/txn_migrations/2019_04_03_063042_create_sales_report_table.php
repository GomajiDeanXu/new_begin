<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesReportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_report', function(Blueprint $table)
		{
			$table->integer('sr_id', true);
			$table->integer('product_id')->default(0)->index('product_idx');
			$table->integer('sp_id')->default(0);
			$table->integer('trans_count')->default(0);
			$table->integer('total_buy_number')->default(0);
			$table->integer('total_refund_number')->default(0);
			$table->integer('price')->default(0);
			$table->integer('total_money')->default(0);
			$table->integer('amount')->default(0);
			$table->integer('use_bonus')->default(0);
			$table->integer('use_pcode')->default(0);
			$table->integer('publish_ts')->default(0)->index('publish_ts_idx');
			$table->integer('off_shelf_ts')->default(0)->index('off_shelf_ts_idx');
			$table->integer('city_id')->default(0)->index('city_idx');
			$table->string('city_name', 45)->nullable();
			$table->string('store_name', 45)->nullable();
			$table->integer('rpt_ts')->default(0)->index('idx_rpt_ts');
			$table->boolean('channel')->default(0)->index('idx_channel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_report');
	}

}

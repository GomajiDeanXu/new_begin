<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesNetRevenueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_net_revenue', function(Blueprint $table)
		{
			$table->increments('snr_id');
			$table->integer('sales_id')->default(0)->index('idx_sales_id');
			$table->float('netrevenue', 12, 4)->default(0.0000);
			$table->integer('month_cycle')->default(0)->index('idx_month_cycle')->comment('資料年月');
			$table->timestamp('date_create')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('資料建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_net_revenue');
	}

}

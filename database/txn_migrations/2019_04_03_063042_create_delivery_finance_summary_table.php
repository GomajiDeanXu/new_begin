<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryFinanceSummaryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_finance_summary', function(Blueprint $table)
		{
			$table->integer('dfs_id', true)->comment('ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->integer('delivery_cycle')->default(0)->comment('請款區間');
			$table->integer('delivery_ttl')->default(0)->comment('該月正物流總計');
			$table->integer('back_ttl')->default(0)->comment('該月逆物流總計');
			$table->integer('sum_ttl')->default(0)->comment('該月正逆物流總合');
			$table->integer('cost')->default(0)->comment('扣款總金額');
			$table->integer('com_id')->default(1)->comment('物流商[1]:黑貓[2]:宅配通');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_finance_summary');
	}

}

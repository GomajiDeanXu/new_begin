<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreFinanceDeliveryFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_finance_delivery_fee', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('ID');
			$table->integer('sf_id')->default(0)->index('idx_sf_id')->comment('店家請款ID(store_finance.sf_id)');
			$table->integer('dfs_id')->default(0)->index('idx_dfs_id')->comment('物流費總表ID(delivery_finance_summary.dfs_id)');
			$table->integer('fee')->default(0)->comment('扣款金額');
			$table->integer('create_ts')->default(0)->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_finance_delivery_fee');
	}

}

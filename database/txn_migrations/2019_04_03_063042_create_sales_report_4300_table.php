<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesReport4300Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_report_4300', function(Blueprint $table)
		{
			$table->integer('sr_id', true);
			$table->integer('group_id')->default(0)->index('idx_group_id');
			$table->integer('rpt_ts')->default(0)->index('idx_rpt_ts')->comment('計算區間');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('顧問編號');
			$table->integer('addup_quantity')->default(0)->comment('累計件數');
			$table->integer('addup_bonus')->default(0)->comment('累計件數獎金');
			$table->integer('type')->default(0)->comment('資料類型[1]明細[0]加總');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_report_4300');
	}

}

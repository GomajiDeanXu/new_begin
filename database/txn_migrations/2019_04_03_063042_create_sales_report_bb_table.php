<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesReportBbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_report_bb', function(Blueprint $table)
		{
			$table->integer('sr_id', true);
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('group_id')->default(0)->index('idx_group_id');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id');
			$table->integer('date_create')->default(0)->comment('資料建立時間');
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('計算日');
			$table->integer('sale_number')->default(0)->comment('銷售數');
			$table->integer('total_amount')->default(0)->comment('刷卡金額');
			$table->integer('total_use_points')->default(0)->comment('總折抵點數');
			$table->integer('total_gm_fee')->default(0)->comment('GM 拆分銷售金額');
			$table->integer('refundb_number')->default(0)->comment('非當月交易當月退費數');
			$table->integer('refundb_amount')->default(0)->comment('非當月交易當月退費金額');
			$table->integer('refundb_points')->default(0)->comment('非當月退折抵點數');
			$table->integer('refundb_gm_fee')->default(0)->comment('非當月交易當月退費 GM 拆分金額');
			$table->integer('refundc_number')->default(0)->comment('當月交易當月退費數');
			$table->integer('refundc_amount')->default(0)->comment('當月交易當月退費金額');
			$table->integer('refundc_points')->default(0)->comment('當月退折抵點數');
			$table->integer('refundc_gm_fee')->default(0)->comment('當月交易當月退費 GM 拆分金額');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_report_bb');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesReportOtaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_report_ota', function(Blueprint $table)
		{
			$table->integer('sr_id', true);
			$table->integer('group_id')->default(0)->index('idx_group_id');
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('date_create')->default(0)->comment('資料建立時間');
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('計算日');
			$table->integer('sale_number')->default(0)->comment('銷售數');
			$table->integer('total_sale_money')->default(0)->comment('總金額');
			$table->float('sale_money', 12, 4)->default(0.0000)->comment('店家拆分銷售金額');
			$table->float('gm_sale_money', 12, 4)->default(0.0000)->comment('GM 拆分銷售金額');
			$table->float('sale_refundb_money', 12, 4)->default(0.0000)->comment('非當月退店家收取金額(算銷售金額)');
			$table->float('gm_sale_refundb_money', 12, 4)->default(0.0000)->comment('非當月退GM拆分收取金額(算銷售金額)');
			$table->float('sale_refundc_money', 12, 4)->default(0.0000)->comment('當月退店家收取金額(算銷售金額)');
			$table->float('gm_sale_refundc_money', 12, 4)->default(0.0000)->comment('當月退GM拆分收取金額(算銷售金額)');
			$table->integer('refundb_number')->default(0)->comment('非當月交易當月退費數');
			$table->integer('total_refundb_money')->default(0)->comment('非當月交易當月退費金額');
			$table->float('refundb_money', 12, 4)->default(0.0000)->comment('非當月交易當月退費店家拆分金額');
			$table->float('gm_refundb_money', 12, 4)->default(0.0000)->comment('非當月交易當月退費 GM 拆分金額');
			$table->integer('refundc_number')->default(0)->comment('當月交易當月退費數');
			$table->integer('total_refundc_money')->default(0)->comment('當月交易當月退費金額');
			$table->float('refundc_money', 12, 4)->default(0.0000)->comment('當月交易當月退費店家拆分金額');
			$table->float('gm_refundc_money', 12, 4)->default(0.0000)->comment('當月交易當月退費 GM 拆分金額');
			$table->integer('use_pcode')->default(0)->comment('總使用麻吉券點數');
			$table->integer('refundb_pcode')->default(0)->comment('非當月退麻吉券點數');
			$table->integer('refundc_pcode')->default(0)->comment('當月退麻吉券點數');
			$table->integer('use_points')->default(0)->comment('總折抵點數');
			$table->integer('refundb_points')->default(0)->comment('非當月退折抵點數');
			$table->integer('refundc_points')->default(0)->comment('當月退折抵點數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_report_ota');
	}

}

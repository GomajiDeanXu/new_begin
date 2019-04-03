<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesReport2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_report2', function(Blueprint $table)
		{
			$table->integer('sr2_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('date_create')->default(0)->comment('資料建立時間');
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('計算日');
			$table->integer('sale_number')->default(0)->comment('銷售數');
			$table->float('sale_money', 12, 4)->default(0.0000)->comment('店家拆分銷售金額');
			$table->float('gm_sale_money', 12, 4)->default(0.0000)->comment('GM 拆分銷售金額');
			$table->integer('refundb_number')->default(0)->comment('非當月交易當月退費數');
			$table->float('refundb_money', 12, 4)->default(0.0000)->comment('非當月交易當月退費店家拆分金額');
			$table->float('gm_refundb_money', 12, 4)->default(0.0000)->comment('非當月交易當月退費 GM 拆分金額');
			$table->integer('refundbf_number')->default(0)->comment('非當月交易當月到期自動退費數');
			$table->float('refundbf_money', 12, 4)->default(0.0000)->comment('非當月交易當月到期自動退費店家拆分金額');
			$table->float('gm_refundbf_money', 12, 4)->default(0.0000)->comment('非當月交易當月到期自動退費 GM 拆分金額');
			$table->integer('refundc_number')->default(0)->comment('當月交易當月退費數');
			$table->float('refundc_money', 12, 4)->default(0.0000)->comment('當月交易當月退費店家拆分金額');
			$table->float('gm_refundc_money', 12, 4)->default(0.0000)->comment('當月交易當月退費 GM 拆分金額');
			$table->integer('refundcf_number')->default(0)->comment('當月交易當月到期自動退費數');
			$table->float('refundcf_money', 12, 4)->default(0.0000)->comment('當月交易當月到期自動退費店家拆分金額');
			$table->float('gm_refundcf_money', 12, 4)->default(0.0000)->comment('當月交易當月到期自動退費 GM 拆分金額');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_report2');
	}

}

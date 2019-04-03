<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesErpAnalyseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_erp_analyse', function(Blueprint $table)
		{
			$table->integer('sales_erp_id', true);
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('資料日期');
			$table->integer('type')->default(0)->index('idx_type')->comment('資料類型 [1]：銷售數(當日) [2]：61C [3]：61E [4]：61B [5]：61B未印 [6]：61D [7]：61F [8]：淨銷售 [9]：當日累積銷售(=前一天淨銷售+當日銷售)');
			$table->boolean('discount_type')->default(0)->comment('0: 無折抵 1: 金額折抵 2: 折數折抵');
			$table->integer('money')->default(0)->comment('折價金額');
			$table->float('discount', 11)->default(0.00)->comment('折抵折數');
			$table->integer('discount_pcode')->default(0)->comment('實際折抵麻吉券金額');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('number')->default(0)->comment('銷售數量');
			$table->integer('use_number')->default(0)->comment('麻吉券使用數量');
			$table->integer('create_ts')->default(0)->comment('創建日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_erp_analyse');
	}

}

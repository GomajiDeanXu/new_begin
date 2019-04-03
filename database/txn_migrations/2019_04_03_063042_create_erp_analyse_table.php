<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateErpAnalyseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('erp_analyse', function(Blueprint $table)
		{
			$table->integer('erp_id', true);
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('資料日期');
			$table->integer('type')->default(0)->index('idx_type')->comment('資料類型
[1]：銷售數(當日)
[2]：61C
[3]：61E
[4]：61B
[5]：61B未印
[6]：61D
[7]：61F
[8]：淨銷售
[9]：當日累積銷售(=前一天淨銷售+當日銷售)');
			$table->integer('product_id')->default(0)->index('product_id');
			$table->integer('branch_id')->default(0)->index('branch_id');
			$table->integer('sp_id')->default(0)->index('sp_id');
			$table->integer('number')->default(0)->comment('資料數量');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('erp_analyse');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesKpiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_kpi', function(Blueprint $table)
		{
			$table->integer('skpi_id', true);
			$table->integer('sales_id');
			$table->integer('k_month')->index('idx_k_month');
			$table->integer('net_rev_kpi')->default(0);
			$table->boolean('flag')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_kpi');
	}

}

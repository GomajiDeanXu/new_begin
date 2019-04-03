<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAbroadNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('product_abroad_number', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id');
			$table->integer('sp_id')->unsigned()->default(0)->index('idx_sp_id');
			$table->integer('branch_id')->unsigned()->default(0)->index('idx_branch_id');
			$table->integer('sale_number')->unsigned()->default(0);
			$table->integer('date_create')->unsigned()->default(0);
			$table->integer('date_cycle')->unsigned()->default(0)->index('idx_date_cycle');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('product_abroad_number');
	}

}

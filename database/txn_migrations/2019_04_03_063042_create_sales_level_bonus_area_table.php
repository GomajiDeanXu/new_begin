<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesLevelBonusAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_level_bonus_area', function(Blueprint $table)
		{
			$table->integer('area_id', true);
			$table->integer('channel');
			$table->integer('month_cycle');
			$table->integer('postal_code');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_level_bonus_area');
	}

}

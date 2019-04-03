<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailyDistrictTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_district', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('city_id')->default(0);
			$table->integer('district_id')->default(0);
			$table->integer('instant_id')->default(0);
			$table->integer('event_start_ts')->default(0);
			$table->integer('event_end_ts')->default(0);
			$table->integer('store_id')->default(0);
			$table->integer('create_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('daily_district');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYearCalendarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('year_calendar', function(Blueprint $table)
		{
			$table->integer('yc_id', true);
			$table->integer('day_ts')->default(0)->index('idx_day_ts');
			$table->boolean('day_type')->default(0)->comment('0:不放假
1:放假');
			$table->string('special_day_ids')->default('');
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
		Schema::drop('year_calendar');
	}

}

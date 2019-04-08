<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar', function(Blueprint $table)
		{
			$table->integer('cal_id', true);
			$table->date('days')->nullable();
			$table->date('days')
			->default('0000-00-00')->unique('idx_days')->comment('國曆日期')->change();
			$table->date('days2')->nullable();
			$table->date('days2')
			->default('0000-00-00')->comment('農曆日期')->change();
			$table->integer('week')->default(0)->comment('星期');
			$table->string('cal_map_ids')->default('')->comment('gomaji.calendar_map.cal_map_id');
			$table->boolean('flag')->default(0)->comment('0:不放假
1:放假');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar');
	}

}

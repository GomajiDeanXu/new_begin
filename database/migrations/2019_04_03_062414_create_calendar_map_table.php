<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCalendarMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendar_map', function(Blueprint $table)
		{
			$table->integer('cal_map_id', true);
			$table->string('day_name', 64)->default('');
			$table->date('days')->default('0000-00-00');
			$table->boolean('type')->default(1)->comment('0:不放假
1:放假');
			$table->boolean('flag')->default(1)->comment('1:國曆
2:農曆
3:特殊');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('calendar_map');
	}

}

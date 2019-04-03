<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpecialDayMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('special_day_map', function(Blueprint $table)
		{
			$table->integer('sdi_id', true);
			$table->string('special_day_name', 64)->default('');
			$table->integer('special_day_ts')->default(0);
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
		Schema::drop('special_day_map');
	}

}

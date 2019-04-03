<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventAreaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_area', function(Blueprint $table)
		{
			$table->integer('area_id', true);
			$table->integer('event_id')->default(0)->index('idx_event_id')->comment('活動ID');
			$table->string('area_name', 32)->nullable()->comment('地區名稱');
			$table->boolean('area_order')->default(0)->comment('地區排序(由小到大)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_area');
	}

}

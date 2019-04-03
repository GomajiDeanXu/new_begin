<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarSliderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('star_slider', function(Blueprint $table)
		{
			$table->increments('slider_id');
			$table->integer('block_id')->unsigned()->nullable()->default(0)->index('idx_block_id');
			$table->string('pic', 128);
			$table->string('start_ts', 10);
			$table->string('end_ts', 10);
			$table->integer('sort')->unsigned()->nullable()->default(0);
			$table->boolean('new')->nullable()->default(0);
			$table->boolean('display')->nullable()->default(0);
			$table->boolean('flag')->nullable()->default(0);
			$table->boolean('ch')->nullable()->default(0)->comment('refer gomaji.channel_map.channel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('star_slider');
	}

}

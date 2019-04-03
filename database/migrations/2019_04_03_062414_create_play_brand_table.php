<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayBrandTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('play_brand', function(Blueprint $table)
		{
			$table->increments('pb_id');
			$table->integer('ch')->unsigned()->default(0)->index('idx_ch');
			$table->string('title');
			$table->string('pic');
			$table->integer('store_id')->unsigned()->default(0)->index('idx_store_id');
			$table->integer('sort')->unsigned()->default(0);
			$table->integer('date_s')->unsigned()->default(0);
			$table->integer('date_e')->unsigned()->default(0);
			$table->integer('create_ts')->unsigned()->default(0);
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('play_brand');
	}

}

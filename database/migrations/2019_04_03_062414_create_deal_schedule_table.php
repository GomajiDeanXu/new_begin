<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('deal_schedule', function(Blueprint $table)
		{
			$table->integer('ds_id', true);
			$table->integer('product_id')->default(0)->index('idx_pid');
			$table->boolean('s_type')->default(0)->index('idx_st');
			$table->integer('create_ts')->default(0);
			$table->integer('run_ts')->default(0)->index('idx_rt');
			$table->boolean('s_flag')->default(0)->index('idx_sf');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('deal_schedule');
	}

}

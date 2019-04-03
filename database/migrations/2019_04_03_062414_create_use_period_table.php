<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsePeriodTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('use_period', function(Blueprint $table)
		{
			$table->increments('use_period_id');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->boolean('use_day_type')->default(0)->comment('使用日(0: 一般使用日 / 1: 週六 / 2: 週日)');
			$table->integer('use_period_start')->default(0)->comment('時段開始(分鐘)');
			$table->integer('use_period_end')->default(0)->comment('時段結束(分鐘)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('use_period');
	}

}

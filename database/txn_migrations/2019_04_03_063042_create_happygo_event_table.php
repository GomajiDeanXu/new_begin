<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHappygoEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('happygo_event', function(Blueprint $table)
		{
			$table->increments('aid');
			$table->integer('product_id')->unsigned()->comment('商品ID');
			$table->integer('start_ts')->unsigned()->comment('開始時間');
			$table->integer('end_ts')->unsigned()->comment('結束時間');
			$table->boolean('multiple')->comment('紅利倍數');
			$table->integer('create_ts')->unsigned()->comment('活動建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('happygo_event');
	}

}

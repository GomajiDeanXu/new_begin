<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_store', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('event_id')->index('idx_event_id')->comment('活動ID');
			$table->integer('store_id')->comment('店家ID');
			$table->integer('area_id')->default(0)->comment('活動的地區ID');
			$table->string('store_tel', 45)->nullable()->comment('店家電話');
			$table->text('store_event', 65535)->nullable()->comment('店家提供的優惠活動');
			$table->integer('event_start_ts')->default(0)->comment('優惠活動開始時間');
			$table->integer('event_end_ts')->default(0)->comment('優惠活動結束時間');
			$table->integer('store_order')->default(0)->comment('店家排序');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event_store');
	}

}

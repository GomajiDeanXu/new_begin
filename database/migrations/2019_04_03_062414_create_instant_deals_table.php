<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstantDealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instant_deals', function(Blueprint $table)
		{
			$table->integer('instant_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->integer('order_no')->default(0)->index('idx_order_no')->comment('購買數');
			$table->integer('max_order_no')->default(0)->index('idx_max_order_no')->comment('購買上限數');
			$table->integer('event_start_ts')->default(0)->index('idx_event_start_ts')->comment('時段開始時間');
			$table->integer('event_end_ts')->default(0)->index('idx_event_end_ts')->comment('時段結束時間');
			$table->integer('flag')->default(0)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instant_deals');
	}

}

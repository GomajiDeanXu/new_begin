<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInstantDealsCopyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('instant_deals_copy', function(Blueprint $table)
		{
			$table->integer('instant_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('order_no')->default(0);
			$table->integer('max_order_no')->default(0);
			$table->integer('event_start_ts')->default(0)->index('idx_event_start_ts');
			$table->integer('event_end_ts')->default(0);
			$table->integer('flag')->default(0)->index('idx_flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('instant_deals_copy');
	}

}

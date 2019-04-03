<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryPriceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('delivery_price', function(Blueprint $table)
		{
			$table->integer('delivery_price_id', true)->comment('物流費用ID');
			$table->integer('com_id')->default(0)->comment('物流商[1:黑貓 / 2:宅配通]');
			$table->integer('temperature')->default(0)->comment('溫層[0];初始資料[1]:常溫[2]:冷藏[3]:冷凍');
			$table->integer('size')->default(0)->comment('規格[60]:60cm[90]:90cm[120]:120cm[150]:150cm');
			$table->integer('price')->default(0)->comment('物流費用');
			$table->integer('flag')->default(1)->comment('資料標記[0]:無效資料[1]:有效資料');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('delivery_price');
	}

}

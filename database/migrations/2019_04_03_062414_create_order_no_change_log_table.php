<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderNoChangeLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_no_change_log', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('date_change')->default(0)->index('idx_date_change')->comment('修改時間');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->integer('instant_id')->default(0)->index('idx_instant_id')->comment('我餓了時段ID');
			$table->integer('org')->nullable()->comment('原座位數');
			$table->integer('new')->nullable()->comment('修改後的座位數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_no_change_log');
	}

}

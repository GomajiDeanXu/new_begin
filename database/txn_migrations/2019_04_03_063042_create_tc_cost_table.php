<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTcCostTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tc_cost', function(Blueprint $table)
		{
			$table->integer('tc_id', true);
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品編號');
			$table->integer('cycle')->default(0)->index('cycle')->comment('計費日期');
			$table->integer('store_money')->default(0)->comment('計費金額');
			$table->integer('tc_money')->default(0)->comment('實付金額');
			$table->integer('date_create')->default(0)->index('date_create')->comment('建立日期');
			$table->integer('flag')->default(1)->index('flag')->comment('資料狀態(1:有效(預設))');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tc_cost');
	}

}

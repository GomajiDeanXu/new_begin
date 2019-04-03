<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_finance', function(Blueprint $table)
		{
			$table->integer('df_id', true)->comment('物流請款ID');
			$table->integer('product_id')->default(0)->comment('PID');
			$table->integer('store_id')->default(0)->comment('店家ID');
			$table->integer('com_id')->default(1)->comment('物流商[1]:黑貓[2]:宅配通');
			$table->integer('store_number')->default(0)->comment('店家出貨份數');
			$table->integer('delivery_number')->default(0)->comment('物流出貨份數');
			$table->integer('store_back_number')->default(0)->comment('店家退貨份數');
			$table->integer('delivery_back_number')->default(0)->comment('物流退貨份數');
			$table->integer('total_money')->default(0)->comment('物流出貨費用總額');
			$table->integer('total_back_money')->default(0)->comment('物流退貨費用總額');
			$table->integer('delivery_cycle')->default(0)->comment('請款區間');
			$table->integer('flag')->default(1)->comment('狀態[1]:有效資料[0]:無效資料');
			$table->integer('di_id')->default(0)->comment('物流發票ID');
			$table->string('virtual_account', 20)->nullable()->default('')->comment('店家轉帳之虛擬帳號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_finance');
	}

}

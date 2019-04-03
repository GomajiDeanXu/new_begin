<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_invoice', function(Blueprint $table)
		{
			$table->integer('di_id', true)->comment('物流發票ID');
			$table->integer('delivery_cycle')->default(0)->comment('請款區間');
			$table->integer('store_id')->default(0)->comment('店家ID');
			$table->integer('delivery_money')->default(0)->comment('物流費用');
			$table->string('inv_no', 45)->default('')->comment('發票號碼');
			$table->integer('inv_ts')->default(0)->comment('發票開立日期');
			$table->integer('receive_ts')->default(0)->comment('收款日期');
			$table->integer('flag')->default(1)->comment('資料標記[1]:有效[0]:無效');
			$table->integer('receive_flag')->default(0)->comment('收款狀態');
			$table->integer('receive_money')->default(0)->comment('收款金額');
			$table->integer('b_flag')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_invoice');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReverseInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('reverse_info', function(Blueprint $table)
		{
			$table->integer('reverse_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('purchase_id')->comment('交易序號');
			$table->integer('date_create')->default(0)->index('date_create')->comment('建立日期');
			$table->boolean('shipments')->default(0)->index('shipments')->comment('店家出貨標記(0:未出貨1:已出貨)');
			$table->string('shipments_no', 45)->default('')->index('shipments_no')->comment('貨運單號');
			$table->string('memo')->comment('備註');
			$table->integer('date_shipments')->default(0)->index('date_shipments')->comment('出貨日期');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品編號');
			$table->integer('reverse_item')->default(0)->comment('逆物流件數');
			$table->integer('pick_up_ts')->default(0)->index('pick_up_ts')->comment('取件日');
			$table->integer('process_ts')->default(0)->index('process_ts')->comment('最近處理日期');
			$table->string('close', 45)->default('0')->index('close')->comment('結案否(\'Y\':結案\'-\':未結案)');
			$table->string('status', 45)->default('')->index('status')->comment('目前狀態');
			$table->string('des', 45)->default('')->comment('細節說明');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('reverse_info');
	}

}

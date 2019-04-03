<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStorePickupDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_pickup_detail', function(Blueprint $table)
		{
			$table->integer('sm_detail_id', true);
			$table->integer('sm_main_id')->default(0)->index('idx_sm_main_id')->comment('對應gomaji.store_pickup_main.sm_main_id');
			$table->string('shipment_no', 20)->default('0')->index('idx_shipment_no')->comment('B2C的貨運編號');
			$table->string('order_no', 20)->default('0')->comment('訂單編號');
			$table->boolean('status')->default(0)->comment('判斷此shipment_no 是否還有效，1：live, 2：dead');
			$table->boolean('status_details')->default(0)->comment('參照flag_mapping: 1：未寄件，2：配送中，3：賣家已到店寄件，4：貨到門市，5：買家完成取貨，6：退貨中，7：賣家完成取貨，8：賠償，9：出貨編號失效');
			$table->string('ship_dt', 10)->default('0')->comment('出貨日期');
			$table->string('pickup_dt', 10)->default('0')->comment('取貨日期');
			$table->string('arrival_dt', 10)->default('0')->comment('送達日期');
			$table->integer('create_ts')->default(0)->comment('row data 建立時間');
			$table->string('modify_by', 20)->default('')->comment('記錄最後維護人員');
			$table->integer('modify_ts')->default(0)->comment('row data 修改時間');
			$table->boolean('bflag')->default(0)->comment('bitwise：1：已列印，bitwise:2：可出貨，bitwise:3：異常件');
			$table->index(['shipment_no','status'], 'idx1_store_pickup_detail');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_pickup_detail');
	}

}

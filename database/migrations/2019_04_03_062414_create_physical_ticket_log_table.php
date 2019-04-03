<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhysicalTicketLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('physical_ticket_log', function(Blueprint $table)
		{
			$table->integer('tk_id')->index('idx_tk_id');
			$table->integer('batch_id')->default(0)->index('idx_batch_id')->comment('批次編號');
			$table->string('serial_no', 45)->default('')->index('idx_serial_no')->comment('票券號碼');
			$table->boolean('status')->default(1)->index('idx_status')->comment('票券狀態');
			$table->integer('allocate_ts')->default(0)->comment('配給時間');
			$table->integer('delivery_ts')->default(0)->index('idx_delivery_ts')->comment('出貨時間');
			$table->integer('status_ts')->default(0)->comment('狀態時間');
			$table->integer('product_id')->default(0)->index('idx_proudct_id')->comment('商品編號');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單編號');
			$table->bigInteger('coupon_id')->default(0)->index('idx_coupon_id')->comment('兌換券編號');
			$table->integer('log_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('physical_ticket_log');
	}

}

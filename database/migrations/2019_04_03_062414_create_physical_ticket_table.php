<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhysicalTicketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('physical_ticket', function(Blueprint $table)
		{
			$table->integer('tk_id', true);
			$table->integer('batch_id')->default(0)->index('idx_batch_id')->comment('批次編號');
			$table->string('serial_no', 45)->default('')->index('idx_serial_no')->comment('票券號碼');
			$table->boolean('status')->default(1)->index('idx_status')->comment('票券狀態');
			$table->integer('allocate_ts')->default(0)->comment('配給時間');
			$table->integer('delivery_ts')->default(0)->index('idx_delivery_ts')->comment('出貨時間');
			$table->integer('status_ts')->default(0)->comment('狀態時間');
			$table->integer('product_id')->default(0)->index('idx_proudct_id')->comment('商品編號');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單編號');
			$table->bigInteger('coupon_id')->default(0)->index('idx_coupon_id')->comment('兌換券編號');
			$table->integer('depository_id')->nullable()->default(0)->comment('倉庫id, 對應 erp.depository.depository_id');
			$table->string('deposit_no', 64)->nullable()->default('')->comment('入庫單號，對應 erp.deposit.deposit_no');
			$table->string('pickup_no', 64)->nullable()->default('')->comment('出庫單號，對應 erp.pickup.pickup_no');
			$table->string('transfer_no', 64)->nullable()->default('')->comment('調撥單號，對應 erp.transfer.transfer_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('physical_ticket');
	}

}

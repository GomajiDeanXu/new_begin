<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryReturnInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_return_info', function(Blueprint $table)
		{
			$table->integer('delivery_return_id', true)->comment('退貨資訊id');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單序號');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->integer('date_create')->default(0)->comment('建立時間');
			$table->string('name', 45)->default('')->comment('收件人姓名');
			$table->string('mobile_phone', 45)->default('');
			$table->string('zip', 5)->default('')->comment('郵遞區號');
			$table->string('address')->default('')->comment('地址');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('資料狀態[1]：正常[-1]：刪除');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('PID');
			$table->integer('qid')->default(0)->index('idx_qid')->comment('退費資料id');
			$table->string('shipments_no', 45)->default('');
			$table->integer('date_shipments')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_return_info');
	}

}

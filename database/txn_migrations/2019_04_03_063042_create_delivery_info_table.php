<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_info', function(Blueprint $table)
		{
			$table->integer('delivery_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('date_create')->default(0);
			$table->string('name', 45);
			$table->string('zip', 5)->default('');
			$table->string('address');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->boolean('shipments')->default(0)->index('idx_shipments');
			$table->string('shipments_no', 45)->default('');
			$table->string('memo')->nullable();
			$table->integer('date_shipments')->default(0)->index('date_shipments');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->string('mobile_phone', 45)->index('mobile_phone');
			$table->integer('item')->default(0)->index('item');
			$table->integer('reverse_item')->default(0)->index('reverse_item');
			$table->integer('pick_up_ts')->default(0)->index('pick_up_ts');
			$table->integer('process_ts')->default(0)->index('process_ts');
			$table->integer('close')->default(0)->index('close');
			$table->string('status', 45)->index('status');
			$table->string('des');
			$table->integer('data_flag')->default(0)->index('data_flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_info');
	}

}

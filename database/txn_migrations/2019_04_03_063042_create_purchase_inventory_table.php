<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePurchaseInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('purchase_inventory', function(Blueprint $table)
		{
			$table->integer('pur_inv_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('inventory_id')->default(0);
			$table->integer('quantity')->default(0);
			$table->integer('create_ts')->default(0);
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('purchase_inventory');
	}

}

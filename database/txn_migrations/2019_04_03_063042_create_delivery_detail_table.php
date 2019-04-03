<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_detail', function(Blueprint $table)
		{
			$table->integer('dd_id', true);
			$table->integer('delivery_id')->default(0)->index('idx_delivery_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('final_shipments_date')->default(0)->index('idx_final_shipments_date');
			$table->boolean('flag')->default(1)->index('idx_flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_detail');
	}

}

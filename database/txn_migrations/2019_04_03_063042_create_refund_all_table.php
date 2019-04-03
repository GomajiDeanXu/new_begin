<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundAllTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund_all', function(Blueprint $table)
		{
			$table->integer('refund_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('email', 45)->default('')->index('idx_email');
			$table->boolean('batch_no')->default(0);
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_queue')->default(0);
			$table->integer('date_refund')->default(0);
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->boolean('inv_howdo_flag')->default(0);
			$table->string('memo')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund_all');
	}

}

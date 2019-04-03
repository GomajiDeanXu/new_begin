<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundMoneyLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund_money_log', function(Blueprint $table)
		{
			$table->integer('rmid', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('deals_money')->default(0);
			$table->boolean('buy_number')->default(0);
			$table->boolean('refund_times')->default(0);
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('date_create')->default(0);
			$table->integer('date_update')->default(0);
			$table->boolean('refund_number')->default(0);
			$table->integer('refund_money')->default(0);
			$table->integer('refund_discount')->default(0);
			$table->integer('refund_pcode')->default(0);
			$table->integer('refund_bonus')->default(0);
			$table->integer('refund_amount')->default(0);
			$table->string('memo')->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund_money_log');
	}

}

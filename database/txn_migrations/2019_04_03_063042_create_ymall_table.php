<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYmallTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ymall', function(Blueprint $table)
		{
			$table->string('transaction_id', 64)->default('0');
			$table->string('order_id', 64)->default('0')->primary();
			$table->bigInteger('bill_no')->default(0)->index('index_bill_no');
			$table->bigInteger('purchase_id')->default(0)->index('index_purchase_id');
			$table->string('ypid', 64)->default('0');
			$table->string('ypid_spec', 64)->default('0');
			$table->integer('product_id')->default(0)->index('index_product_id');
			$table->integer('sp_id')->default(0)->index('index_sp_id');
			$table->integer('flag')->nullable();
			$table->integer('ts')->default(0);
			$table->integer('closed_ts')->default(0);
			$table->integer('refund_id')->nullable()->index('index_refund_id');
			$table->integer('refund_ts')->nullable();
			$table->integer('exchange_id')->nullable()->index('index_exchange_id');
			$table->integer('exchange_ts')->nullable();
			$table->string('pay_type', 8)->nullable();
			$table->integer('date_writeoff')->nullable()->default(0);
			$table->integer('date_refund_writeoff')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ymall');
	}

}

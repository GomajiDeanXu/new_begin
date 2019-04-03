<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateB2bRefundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('b2b_refund', function(Blueprint $table)
		{
			$table->integer('refund_id', true)->comment('auto id');
			$table->integer('client_id')->default(0)->index('idx_client_id')->comment('廠商id');
			$table->integer('qid')->default(0)->index('idx_qid')->comment('deal_queue.qid');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('user_purchases.purchase_id');
			$table->integer('refund_number')->default(0)->comment('退費數量');
			$table->integer('refund_money')->default(0)->comment('退費金額');
			$table->integer('date_finish')->default(0)->comment('退費完成日');
			$table->integer('date_refund_writeoff')->default(0)->index('idx_date_refund_writeoff')->comment('壓帳日');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('b2b_refund');
	}

}

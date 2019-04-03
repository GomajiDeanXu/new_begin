<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund', function(Blueprint $table)
		{
			$table->integer('refund_id', true);
			$table->integer('qid')->default(0)->index('idx_qid');
			$table->string('payment', 8)->default('')->index('idx_payment');
			$table->string('agent_type', 8)->default('')->index('idx_agent_type');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('refund_amount')->default(0);
			$table->boolean('status')->default(0)->index('idx_stauts');
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_send')->default(0);
			$table->integer('date_finish')->default(0);
			$table->integer('date_writeoff')->default(0)->index('idx_date_writeoff');
			$table->boolean('run_times')->default(0);
			$table->string('memo')->nullable();
			$table->string('batch_id', 16)->default('')->comment('退費批號');
			$table->string('batch_seq', 16)->default('')->comment('退費序號');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund');
	}

}

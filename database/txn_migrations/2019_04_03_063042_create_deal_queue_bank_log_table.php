<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealQueueBankLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('deal_queue_bank_log', function(Blueprint $table)
		{
			$table->integer('qid')->primary();
			$table->string('service_id', 16)->default('');
			$table->integer('log_ts')->default(0);
			$table->string('refund_bank', 128)->default('');
			$table->string('refund_bank_branch', 128)->default('');
			$table->string('refund_account_name', 32)->default('');
			$table->string('refund_account', 128)->default('');
			$table->char('refund_identity_id', 10)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('deal_queue_bank_log');
	}

}

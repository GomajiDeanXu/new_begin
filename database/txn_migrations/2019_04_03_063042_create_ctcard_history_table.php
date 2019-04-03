<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCtcardHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ctcard_history', function(Blueprint $table)
		{
			$table->integer('ctcard_id')->primary();
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('status', 10)->default('')->index('idx_status');
			$table->integer('date_paid')->default(0)->index('idx_date_paid');
			$table->integer('date_refund')->default(0);
			$table->string('email', 45)->default('')->index('idx_email');
			$table->integer('amount')->unsigned()->default(0);
			$table->string('payment_type', 16)->default('')->index('idx_payment_type');
			$table->string('xid', 40)->default('')->index('idx_xid');
			$table->string('auth_rrpid', 40)->default('')->index('idx_auth_rrpid');
			$table->string('auth_code', 6)->default('')->index('idx_auth_code');
			$table->string('term_seq', 16)->default('0');
			$table->string('retr_ref', 12)->default('');
			$table->char('resp_code', 2)->default('');
			$table->char('err_code', 2)->default('');
			$table->integer('recur_num')->default(0);
			$table->integer('prodcode')->default(0);
			$table->string('batch_id', 16)->default('');
			$table->string('batch_seq', 16)->default('');
			$table->char('cardnumber', 11)->default(0)->index('idx_cardnumber');
			$table->char('expiry_date', 6)->default('');
			$table->integer('off_set_amt')->default(0)->comment('折抵金額');
			$table->integer('utilized_point')->comment('本次兌換點數');
			$table->integer('awarded_point')->default(0)->comment('本次賺取點數');
			$table->integer('point_balance')->default(0)->comment('目前點數餘額');
			$table->string('memo')->nullable();
			$table->boolean('check_flag')->default(0);
			$table->integer('date_writeoff')->default(0);
			$table->char('receive', 8)->default('');
			$table->integer('travel_startdate')->default(0);
			$table->integer('travel_enddate')->default(0);
			$table->integer('travel_zip')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ctcard_history');
	}

}

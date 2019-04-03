<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCashDeleteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('cash_delete', function(Blueprint $table)
		{
			$table->integer('atm_id')->primary();
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('status', 10)->default('')->index('idx_status');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('銷帳時間
');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者 email');
			$table->integer('amount')->unsigned()->default(0)->index('idx_amount');
			$table->string('payment_type', 8)->default('')->comment('實際支付工具
ATM
WEBATM

');
			$table->string('virtual_account', 20)->default('')->index('idx_writeoff_number')->comment('銷帳編號
ATM : 虛擬帳號
');
			$table->integer('duedate')->default(0);
			$table->string('user_payname', 8)->default('');
			$table->string('user_payphone', 16)->default('');
			$table->integer('serial_number')->default(0)->index('idx_serial_number')->comment('交易序號(長整數)');
			$table->char('time_paid', 14)->default('')->index('idx_time_paid')->comment('消費者繳款時間');
			$table->boolean('flag')->default(0)->index('idx_flag');
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
		Schema::connection('transaction')->drop('cash_delete');
	}

}

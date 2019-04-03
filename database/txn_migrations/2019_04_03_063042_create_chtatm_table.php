<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChtatmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('chtatm', function(Blueprint $table)
		{
			$table->integer('atm_id', true);
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('status', 10)->default('')->index('idx_status');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('銷帳時間
');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者 email');
			$table->integer('amount')->unsigned()->default(0)->index('idx_amount');
			$table->string('virtual_account', 20)->default('')->index('idx_virtual_account')->comment('銷帳編號
ATM : 虛擬帳號
');
			$table->integer('duedate')->default(0);
			$table->string('full_name', 8)->default('');
			$table->string('mobile_phone', 16)->default('')->index('idx_mobile_phone');
			$table->integer('send_time')->default(0);
			$table->char('send_bank', 3)->default('');
			$table->char('send_account', 16)->default('');
			$table->integer('flag')->default(0);
			$table->integer('date_writeoff')->default(0)->index('idx_date_writeoff');
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
		Schema::connection('transaction')->drop('chtatm');
	}

}

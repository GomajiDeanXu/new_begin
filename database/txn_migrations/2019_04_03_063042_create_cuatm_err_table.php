<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuatmErrTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('cuatm_err', function(Blueprint $table)
		{
			$table->integer('atm_id', true);
			$table->integer('date_create')->default(0)->index('idx_date_create')->comment('訂單產生時間(交易時間)');
			$table->integer('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->char('status', 8)->default('')->index('idx_status')->comment('init : 初始化
success : 訂單成立
paid : 付款成功
fail : 訂單失敗
refund : 退款');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('銷帳時間
');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者 email');
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('amount')->default(0)->index('idx_amount')->comment('轉帳金額');
			$table->string('virtual_account', 20)->default('')->index('idx_virtual_account')->comment('ATM虛擬帳號
');
			$table->integer('duedate')->default(0)->comment('轉帳期限');
			$table->string('full_name', 8)->default('');
			$table->string('mobile_phone', 16)->default('')->index('idx_mobile_phone');
			$table->string('batch_no', 10)->default('');
			$table->integer('send_time')->default(0)->comment('消費者轉帳時間');
			$table->char('send_bank', 3)->default('')->comment('消費者轉出銀行代碼
');
			$table->string('send_account', 20)->default('');
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
		Schema::connection('transaction')->drop('cuatm_err');
	}

}

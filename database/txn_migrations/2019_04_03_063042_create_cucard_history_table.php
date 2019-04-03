<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCucardHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('cucard_history', function(Blueprint $table)
		{
			$table->integer('card_id')->primary();
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('bill_no')->default(0)->index('idx_bill_no')->comment('商家訂單編號');
			$table->string('status', 10)->default('')->index('idx_status');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('請款時間');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間\n');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者 email');
			$table->string('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('amount')->unsigned()->default(0)->index('idx_amount')->comment('訂單金額');
			$table->char('auth_status', 4)->default('');
			$table->char('auth_code', 6)->default('')->comment('授權碼(6碼)');
			$table->integer('auth_time')->default(0)->comment('銀行回覆碼');
			$table->string('auth_msg', 128)->default('')->comment('批次號碼');
			$table->char('cardnumber', 11)->default('')->index('idx_cardnumber')->comment('卡號前六後四');
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
		Schema::connection('transaction')->drop('cucard_history');
	}

}

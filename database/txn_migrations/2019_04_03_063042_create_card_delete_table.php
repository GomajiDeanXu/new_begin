<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardDeleteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('card_delete', function(Blueprint $table)
		{
			$table->integer('card_id')->primary();
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('status', 10)->default('')->index('idx_status');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('請款時間');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間
');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者 email');
			$table->integer('order_number')->default(0)->index('idx_order_number')->comment('藍新訂單編號');
			$table->integer('amount')->unsigned()->default(0)->index('idx_amount')->comment('訂單金額');
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->integer('prc')->nullable();
			$table->integer('src')->nullable();
			$table->char('approve_code', 6)->default('')->comment('授權碼(6碼)');
			$table->string('bank_rc', 8)->default('');
			$table->integer('batch_number')->default(0)->index('idx_betach_number')->comment('批次號碼');
			$table->char('cardnumber', 11)->default('')->index('idx_cardnumber');
			$table->char('issuebank', 4)->default('')->comment('發卡行');
			$table->string('engname', 32)->default('')->comment('持卡人英文姓名');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('travel_startdate')->default(0);
			$table->integer('travel_enddate')->default(0);
			$table->integer('travel_zip')->default(0);
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
		Schema::connection('transaction')->drop('card_delete');
	}

}

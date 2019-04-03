<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamiportTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('famiport', function(Blueprint $table)
		{
			$table->integer('famiport_id', true);
			$table->integer('date_create')->default(0)->index('idx_date_create')->comment('訂單成立時間');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->string('status', 8)->default('')->index('idx_status')->comment('init : 初始化 / success : 訂單成立 / paid : 付款成功 / fail : 訂單失敗 / refund : 退款');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('銷帳時間');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者E-mail');
			$table->string('agent_type', 8)->default('')->index('idx_agent_type')->comment('商店代理類型');
			$table->integer('amount')->unsigned()->default(0)->index('idx_amount')->comment('超商付款金額');
			$table->string('virtual_account', 20)->default('')->index('idx_virtual_account')->comment('繳費單號(Pin_Code)');
			$table->integer('duedate')->default(0)->comment('繳款期限');
			$table->string('full_name', 8)->default('')->comment('消費者姓名');
			$table->string('mobile_phone', 16)->default('')->index('idx_mobile_phone')->comment('消費者手機號碼');
			$table->string('fami_status', 5)->default('')->comment('S: 處理成功(正常) / F: 處理失敗(錯誤)');
			$table->string('fami_rtn_msg', 20)->default('')->comment('記錄全家回覆的錯誤訊息');
			$table->integer('send_time')->default(0)->comment('消費者繳款時間');
			$table->string('fami_store_name', 20)->default('')->comment('消費者繳款店家');
			$table->integer('date_writeoff')->default(0)->index('idx_date_writeoff')->comment('對帳日期');
			$table->integer('fee')->default(0)->comment('手續費');
			$table->string('pay_one_code', 20)->default('')->comment('繳費代號第一段');
			$table->string('pay_two_code', 20)->default('')->comment('繳費代號第二段');
			$table->string('pay_three_code', 20)->default('')->comment('繳費代號第三段');
			$table->string('memo')->nullable()->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('famiport');
	}

}

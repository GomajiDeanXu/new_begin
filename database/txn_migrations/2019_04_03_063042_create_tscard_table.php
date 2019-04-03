<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTscardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tscard', function(Blueprint $table)
		{
			$table->increments('tscard_id');
			$table->string('bill_no', 20)->default('')->index('idx_bill_no')->comment('訂單編號');
			$table->string('agent_type', 16)->default('');
			$table->integer('amount')->unsigned()->default(0)->comment('金額');
			$table->string('status', 10)->default('')->index('idx_status')->comment('狀態');
			$table->string('order_status', 5)->default('')->comment('台新訂單狀態');
			$table->string('email', 50)->default('')->index('idx_email')->comment('電子信箱');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('訂單成立時間');
			$table->integer('paid_ts')->default(0)->index('idx_paid_ts')->comment('付款時間');
			$table->integer('date_refund')->index('idx_date_refund')->comment('退款時間');
			$table->string('ret_code', 5)->default('')->comment('回應碼');
			$table->string('cardnumber', 11)->default('')->index('idx_cardnumber')->comment('卡號前六後四');
			$table->string('auth_code', 7)->default('')->index('idx_auth_code')->comment('授權碼');
			$table->string('auth_type', 11)->default('')->comment('授權方式');
			$table->string('rrn', 15)->default('')->comment('台新銀行調單編號');
			$table->string('purchase_date', 25)->default('')->comment('台新銀行端的交易日期');
			$table->integer('settle_amt')->default(0)->comment('請款金額');
			$table->string('settle_seq', 15)->default('')->comment('請款批號');
			$table->string('settle_date', 12)->default('')->index('idx_settle_date')->comment('請款日期');
			$table->integer('refund_amt')->default(0)->comment('退款金額');
			$table->string('refund_rrn', 15)->default('')->comment('退貨調單編號');
			$table->string('refund_auth_code', 7)->default('')->comment('退貨授權碼');
			$table->string('refund_date', 12)->default('')->index('idx_refund_date')->comment('退貨日期');
			$table->string('redeem_order_no', 12)->default('')->comment('紅利訂單編號');
			$table->integer('redeem_pt')->default(0)->comment('紅利折抵點數');
			$table->integer('redeem_amt')->default(0)->comment('紅利折抵金額');
			$table->integer('redeem_post_pt')->default(0)->comment('紅利剩餘點數');
			$table->integer('redeem_post_amt')->default(0)->comment('紅利實付金額');
			$table->string('install_period', 2)->default('0')->comment('分期期數');
			$table->string('install_order_no', 15)->default('0')->comment('台新銀行分期訂單編號');
			$table->integer('install_down_pay')->default(0)->comment('首期金額');
			$table->integer('install_pay')->default(0)->comment('每期金額');
			$table->string('install_down_pay_fee', 12)->default('0')->comment('首期手續費');
			$table->string('install_pay_fee', 12)->default('0')->comment('每期手續費');
			$table->integer('date_writeoff')->default(0)->index('idx_date_writeoff')->comment('撥款日期');
			$table->string('memo', 100)->nullable()->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tscard');
	}

}

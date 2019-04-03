<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEscardDeleteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('escard_delete', function(Blueprint $table)
		{
			$table->integer('card_id')->primary();
			$table->integer('date_create')->default(0)->index('idx_date_create')->comment('完成交易時間');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('商家訂單編號');
			$table->string('status', 10)->default('')->index('idx_status')->comment('訂單狀態 init / auth / paid / refund / fail');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('請款時間');
			$table->integer('date_refund')->default(0)->comment('退款時間');
			$table->string('email', 45)->default('')->index('idx_email')->comment('消費者email');
			$table->string('agent_type', 8)->default('')->comment('銀行代理類型');
			$table->integer('recur_num')->default(0)->comment('信用卡分期期數 0/3/6');
			$table->integer('recur_one_money')->default(0)->comment('信用卡分期頭期金額');
			$table->integer('recur_num_money')->default(0)->comment('信用卡分期每期金額');
			$table->integer('amount')->unsigned()->default(0)->comment('訂單金額');
			$table->char('err_code', 2)->default('')->comment('銀行回覆碼: 00-核准');
			$table->char('auth_status', 4)->default('')->comment('授權狀態');
			$table->string('auth_msg', 128)->default('')->comment('授權狀態訊息');
			$table->char('auth_code', 6)->default('')->index('idx_auth_code')->comment('授權碼(6碼)');
			$table->char('cardnumber', 11)->default('')->index('idx_cardnumber')->comment('信用卡卡號前六後四');
			$table->integer('date_writeoff')->default(0)->index('idx_date_writeoff')->comment('對帳日期');
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
		Schema::connection('transaction')->drop('escard_delete');
	}

}

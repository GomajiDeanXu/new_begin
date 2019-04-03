<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDealQueueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('deal_queue', function(Blueprint $table)
		{
			$table->integer('qid', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid');
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->boolean('act_type')->default(0)->index('idx_act_type');
			$table->boolean('refund_way')->default(0);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->text('coupon_no', 65535);
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_queue')->default(0);
			$table->integer('date_finish')->default(0)->index('idx_date_finish');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('bflag')->default(0);
			$table->boolean('inv_howdo_flag')->default(0)->index('idx_inv_flag');
			$table->integer('date_inv_allowance')->default(0);
			$table->integer('allowance_id')->default(0);
			$table->string('docs')->default('');
			$table->string('service_id', 16)->default('');
			$table->integer('bank_flag')->default(0)->index('idx_bank_flag')->comment('退匯帳號處理狀態');
			$table->integer('date_bank_account')->default(0)->index('idx_date_account')->comment('退匯帳號修改​​​​​時間');
			$table->boolean('refund_number')->default(0)->comment('退回份數');
			$table->integer('refund_discount')->unsigned()->default(0)->comment('退回折扣金額');
			$table->integer('refund_pcode')->unsigned()->nullable()->default(0)->comment('退回麻吉券金額');
			$table->integer('refund_bonus')->unsigned()->nullable()->default(0)->comment('退回團購金');
			$table->smallInteger('refund_points')->unsigned()->default(0)->comment('退回點數');
			$table->integer('refund_amount')->unsigned()->default(0)->comment('退回現金');
			$table->smallInteger('remain_pcode')->unsigned()->default(0)->comment('不退回(扣留)麻吉券金額');
			$table->smallInteger('remain_bonus')->unsigned()->default(0)->comment('不退回(扣留)團購金');
			$table->smallInteger('remain_points')->unsigned()->default(0)->comment('不退回(扣留)點數');
			$table->smallInteger('remain_amount')->unsigned()->default(0)->comment('不退回(扣留)現金');
			$table->string('refund_bank', 128)->default('')->comment('退匯銀行');
			$table->string('refund_bank_branch', 128)->default('')->comment('退匯分行');
			$table->string('refund_account_name', 32)->default('')->comment('退匯帳戶名稱');
			$table->string('refund_account', 128)->default('')->comment('退匯帳號');
			$table->char('refund_identity_id', 10)->default('')->comment('退匯身份證字號');
			$table->integer('refund_id')->default(0)->index('idx_refund_id');
			$table->string('reason', 45)->default('');
			$table->string('memo', 128)->default('');
			$table->integer('delivery_sid')->default(0)->index('idx_delivery_sid');
			$table->boolean('error_no')->default(0)->comment('退匯帳號修改次數');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('deal_queue');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefFeedbackRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ref_feedback_record', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('offer_id')->default(0)->index('idx_offer_id')->comment('美安&shopback offer_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號 transaction.user_purchases.bill_no');
			$table->integer('amount')->unsigned()->default(0)->comment('金額');
			$table->string('ref', 20)->default('')->comment('導購來源 transaction.user_purchases.site');
			$table->string('rid')->default('美安 rid 對應 transaction.shop_dot_com.rid');
			$table->string('click_id')->default('美安 click_id 對應 transaction.shop_dot_com.rid');
			$table->string('gym_tripid', 20)->nullable()->default('0')->comment('購有錢交易的使用者ID 對應 transaction.shop_dot_com.gym_tripid');
			$table->string('status')->nullable()->comment('回拋結果');
			$table->dateTime('feedback_ts')->nullable();
			$table->dateTime('feedback_ts')
			->default('0000-00-00 00:00:00')->index('idx_feedback_ts')->comment('回拋時間')->change();
			$table->string('transaction_id')->default('')->comment('shopback 訂單追蹤碼');
			$table->smallInteger('sb_order_status')->nullable()->comment('shopback回拋狀態(gomaji自訂) 0:待回拋, 1:回拋成功, 2:回拋失敗, 3:訂單比對異常, 4:回拋失敗(500 error), 5:已重打三次，依然失敗');
			$table->string('sb_order_response')->default('')->comment('shopback回拋結果');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ref_feedback_record');
	}

}

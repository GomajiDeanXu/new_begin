<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTravelcardPostbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('travelcard_postback', function(Blueprint $table)
		{
			$table->integer('tp_id', true);
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號 transaction.user_purchases.bill_no');
			$table->string('action', 10)->default('')->comment('動作 A:新增 U:更新 D:刪除');
			$table->string('status', 10)->default('')->index('idx_status')->comment('回傳電文狀態');
			$table->dateTime('sent_ts')->default('0000-00-00 00:00:00')->index('idx_sent_ts')->comment('電文發送時間');
			$table->dateTime('update_ts')->default('0000-00-00 00:00:00')->comment('電文更新時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('travelcard_postback');
	}

}

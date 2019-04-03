<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundReplyAppealTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund_reply_appeal', function(Blueprint $table)
		{
			$table->integer('reply_id', true)->comment('reply_id');
			$table->integer('refund_no')->nullable()->comment('退費編號 delivery_return_info.qid');
			$table->integer('reply_subject')->nullable()->comment('回覆申訴類別');
			$table->string('reply_content')->nullable()->comment('回覆申訴內容');
			$table->integer('create_ts')->nullable()->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund_reply_appeal');
	}

}

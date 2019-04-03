<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketReplyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_reply', function(Blueprint $table)
		{
			$table->increments('reply_id');
			$table->integer('ticket_id')->unsigned()->default(0)->index('idx_ticket_id')->comment('ticket.ticket_id');
			$table->integer('support_id')->unsigned()->default(0)->comment('回覆的客服人員 support.support_id (0 表示消費者回覆)');
			$table->boolean('reply_type')->default(1)->comment('回覆類型 (1: 回覆 / 2: 備註)');
			$table->text('content', 65535)->nullable()->comment('回覆內容');
			$table->string('attachment', 120)->nullable()->comment('夾帶檔案的檔名');
			$table->integer('reply_ts')->unsigned()->default(0)->comment('回覆時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_reply');
	}

}

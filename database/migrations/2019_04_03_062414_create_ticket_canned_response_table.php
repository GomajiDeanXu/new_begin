<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketCannedResponseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket_canned_response', function(Blueprint $table)
		{
			$table->increments('response_id');
			$table->integer('ticket_category_id')->default(0)->comment('對應的分類(0 表示全部都可使用)');
			$table->string('label', 120)->nullable()->comment('制式回答的 Title');
			$table->text('response_content', 65535)->nullable()->comment('制式回答內容');
			$table->integer('modify_ts')->unsigned()->default(0)->comment('修改時間');
			$table->boolean('flag')->default(1)->comment('0: 不使用 / 1: 使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket_canned_response');
	}

}

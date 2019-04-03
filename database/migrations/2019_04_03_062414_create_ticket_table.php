<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTicketTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ticket', function(Blueprint $table)
		{
			$table->increments('ticket_id');
			$table->integer('ticket_subject_id')->unsigned()->default(0)->comment('主題 ticket_category.ticket_category_id');
			$table->integer('ticket_category_id')->unsigned()->default(0)->comment('分類 ticket_category.ticket_category_id');
			$table->integer('support_id')->unsigned()->default(0)->comment('客服人員 support.support_id');
			$table->string('name', 40)->nullable()->comment('訂購人姓名');
			$table->string('email', 45)->nullable()->comment('訂購人 email');
			$table->string('phone', 20)->nullable()->comment('訂購人電話');
			$table->bigInteger('bill_no')->default(0)->comment('訂單編號 user_purchases.bill_no');
			$table->boolean('status')->default(1)->comment('ticket 狀態(1: 新進件 / 2: 已回覆 / 3: 待回覆 / 4: 已結案)');
			$table->integer('create_ts')->unsigned()->default(0)->comment('進件時間');
			$table->integer('last_contact_ts')->unsigned()->default(0)->comment('消費者最後回覆時間');
			$table->integer('last_reply_ts')->unsigned()->default(0)->comment('客服最後回覆時間');
			$table->integer('close_ts')->unsigned()->default(0)->comment('結案時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ticket');
	}

}

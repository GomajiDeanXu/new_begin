<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentTicketGmTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payment_ticket_gm', function(Blueprint $table)
		{
			$table->bigInteger('ticket_id', true)->unsigned();
			$table->integer('gm_uid')->unsigned()->index('fk_user_payment_ticket')->comment('會員ID');
			$table->integer('scrambling')->unsigned()->default(000000)->comment('擾碼 (6位數字)');
			$table->integer('create_ts')->unsigned()->default(0)->comment('產生時間');
			$table->integer('use_ts')->unsigned()->default(0)->comment('QR Code 出示的時間');
			$table->boolean('status')->default(0)->comment('0: 未使用, 1: 作廢, 2: 已使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('payment_ticket_gm');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFirstBuyGmailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('first_buy_gmail', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->bigInteger('purchase_id')->index('idx_purchase_id')->comment('交易序號');
			$table->string('email', 45)->default('')->index('idx_email')->comment('gmail帳號');
			$table->integer('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('first_buy_gmail');
	}

}

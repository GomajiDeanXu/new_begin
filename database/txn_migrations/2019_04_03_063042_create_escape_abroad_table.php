<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEscapeAbroadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('escape_abroad', function(Blueprint $table)
		{
			$table->integer('ea_id', true);
			$table->integer('purchase_id')->default(0)->index('purchase_id')->comment('交易序號');
			$table->integer('date_create')->default(0)->comment('建立日期');
			$table->integer('date_checkin')->default(0)->comment('入住日期');
			$table->integer('date_checkout')->default(0)->comment('離店日期');
			$table->string('store_order_no', 191)->default('')->index('store_order_no')->comment('詢問單編號');
			$table->boolean('source')->default(0)->index('source')->comment('訂單來源');
			$table->integer('date_writeoff')->default(0)->comment('收款日');
			$table->string('memo');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('escape_abroad');
	}

}

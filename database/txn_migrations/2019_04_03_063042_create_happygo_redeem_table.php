<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHappygoRedeemTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('happygo_redeem', function(Blueprint $table)
		{
			$table->bigInteger('rid', true)->unsigned();
			$table->bigInteger('purchase_id')->index('idx_purchase_id');
			$table->string('point', 10)->default('0');
			$table->integer('amount')->unsigned();
			$table->integer('refund_ts')->unsigned();
			$table->integer('report_date')->unsigned()->index('idx_report_date');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('happygo_redeem');
	}

}

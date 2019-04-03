<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHappygoAwardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('happygo_award', function(Blueprint $table)
		{
			$table->bigInteger('hid', true)->unsigned();
			$table->bigInteger('purchase_id')->unsigned()->index('idx_purchase_id');
			$table->string('identity_id', 10)->index('idx_identity_id');
			$table->string('happygo_card', 20)->index('idx_happygo_card');
			$table->string('award_point', 10)->default('0');
			$table->integer('amount')->unsigned()->default(0);
			$table->string('status', 10)->index('idx_status');
			$table->integer('create_date')->unsigned()->index('idx_create_date');
			$table->integer('paid_ts')->unsigned();
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
		Schema::connection('transaction')->drop('happygo_award');
	}

}

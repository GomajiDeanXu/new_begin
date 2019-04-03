<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEanStatementDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ean_statement_detail', function(Blueprint $table)
		{
			$table->integer('ean_std_id', true);
			$table->integer('ean_stm_id')->default(0)->index('idx_ean_stm_id')->comment('對應transaction.ean_statement_main.ean_stm_id');
			$table->boolean('ean_transaction_type')->default(1)->comment('1:booked 2:cancelled');
			$table->dateTime('ean_transaction_dt')->default('0000-00-00 00:00:00')->comment('ean記錄的交易時間');
			$table->float('ean_amount', 11, 4)->default(0.0000)->comment('ean原幣金額，正向為訂房金額，負向為退費金額');
			$table->dateTime('create_dt')->default('0000-00-00 00:00:00')->comment('建立時間');
			$table->integer('date_cycle')->default(0)->comment('交易產生期數，每月13及28號');
			$table->string('memo')->default('')->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ean_statement_detail');
	}

}

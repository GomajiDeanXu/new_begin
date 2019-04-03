<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeliveryMemoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('delivery_memo', function(Blueprint $table)
		{
			$table->increments('memo_id');
			$table->integer('delivery_id')->unsigned()->default(0)->index('idx_delivery_id');
			$table->string('store_memo')->nullable();
			$table->string('gomaji_memo')->nullable();
			$table->integer('create_ts')->unsigned()->default(0)->comment('記錄時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('delivery_memo');
	}

}

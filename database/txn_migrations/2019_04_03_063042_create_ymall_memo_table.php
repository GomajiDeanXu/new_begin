<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYmallMemoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ymall_memo', function(Blueprint $table)
		{
			$table->string('transaction_id', 64)->default('0')->index('index_transaction_id');
			$table->string('order_id', 64)->default('0')->index('index_order_id');
			$table->string('memo')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ymall_memo');
	}

}

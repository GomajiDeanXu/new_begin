<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateB2bTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('b2b', function(Blueprint $table)
		{
			$table->increments('b2b_id');
			$table->integer('client_id')->unsigned()->default(0)->index('idx_client_id')->comment('廠商識別ID');
			$table->integer('purchase_id')->unsigned()->default(0)->index('idx_purchase_id');
			$table->integer('product_id')->unsigned()->default(0);
			$table->integer('branch_id')->unsigned()->default(0);
			$table->integer('sp_id')->unsigned()->default(0);
			$table->integer('order_id')->unsigned()->default(0)->index('order_id');
			$table->integer('buy_number')->unsigned()->default(0);
			$table->integer('money')->unsigned()->default(0);
			$table->string('user_mobile', 20);
			$table->integer('date_create')->unsigned()->default(0);
			$table->integer('date_paid')->unsigned()->default(0);
			$table->integer('date_refund')->unsigned()->default(0);
			$table->integer('b2b_ststus')->unsigned()->default(0)->comment('1:付款 2:退費');
			$table->integer('date_writeoff')->default(0);
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('b2b');
	}

}

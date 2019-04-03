<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponMemoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_memo', function(Blueprint $table)
		{
			$table->integer('memo_id', true);
			$table->integer('purchase_id')->index('purchase_id');
			$table->integer('coupon_id')->index('coupon_id');
			$table->integer('date_create')->default(0)->index('date_create');
			$table->string('memo')->nullable();
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
		Schema::connection('transaction')->drop('coupon_memo');
	}

}

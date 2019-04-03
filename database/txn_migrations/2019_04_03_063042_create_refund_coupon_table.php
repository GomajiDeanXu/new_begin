<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefundCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('refund_coupon', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('qid')->index('idx_qid');
			$table->text('coupon_no', 65535);
			$table->integer('coupon_id')->index('idx_coupon_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('refund_coupon');
	}

}

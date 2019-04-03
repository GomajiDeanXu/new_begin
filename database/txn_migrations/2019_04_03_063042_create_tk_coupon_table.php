<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTkCouponTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tk_coupon', function(Blueprint $table)
		{
			$table->integer('tk_coupon_id', true);
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->char('auth_serial', 5)->default('')->index('idx_auth_serial');
			$table->char('auth_code', 5)->default('')->index('idx_auth_code');
			$table->integer('use_ts')->default(0)->comment('使用或退費時間');
			$table->text('memo', 65535);
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('1:正常
7:已使用
3:退費');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tk_coupon');
	}

}

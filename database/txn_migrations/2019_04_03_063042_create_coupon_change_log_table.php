<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponChangeLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_change_log', function(Blueprint $table)
		{
			$table->increments('auto_id');
			$table->bigInteger('purchase_id')->unsigned()->default(0)->index('idx_purchase_id');
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->char('auth_code', 5)->default('')->index('idx_auth_code');
			$table->char('auth_serial', 5)->default('')->index('idx_auth_serial');
			$table->boolean('flag')->default(1);
			$table->integer('use_ts')->unsigned()->default(0);
			$table->integer('log_ts')->unsigned()->default(0)->index('idx_log_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('coupon_change_log');
	}

}

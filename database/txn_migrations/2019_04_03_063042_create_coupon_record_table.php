<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponRecordTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_record', function(Blueprint $table)
		{
			$table->integer('cur_id', true);
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('date_create')->default(0);
			$table->integer('date_verify')->default(0)->index('idx_date_verify')->comment('核銷日期');
			$table->integer('date_unverify')->default(0)->index('idx_date_unverify')->comment('反核銷日期');
			$table->integer('sf_id')->default(0)->index('idx_sf_id');
			$table->integer('type')->default(0)->index('idx_type')->comment('1: 核銷
2: 反核銷');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('coupon_record');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustDiffTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_diff', function(Blueprint $table)
		{
			$table->integer('diff_id', true);
			$table->integer('tdid')->default(0)->index('idx_tdid');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->char('coupon_no', 16)->default('')->index('idx_coupon_no');
			$table->integer('coupon_id')->default(0);
			$table->string('used_style', 3)->default('');
			$table->boolean('status')->default(0);
			$table->integer('date_trust')->default(0);
			$table->integer('date_settle')->default(0);
			$table->integer('date_change')->default(0)->index('idx_date_change');
			$table->boolean('coupon_flag')->default(0)->index('idx_coupon_flag');
			$table->integer('product_id')->default(0);
			$table->integer('branch_id')->default(0)->index('branch_id');
			$table->text('memo', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_diff');
	}

}

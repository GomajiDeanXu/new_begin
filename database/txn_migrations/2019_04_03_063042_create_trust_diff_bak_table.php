<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustDiffBakTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_diff_bak', function(Blueprint $table)
		{
			$table->integer('diff_id')->default(0);
			$table->integer('tdid')->default(0);
			$table->bigInteger('purchase_id')->default(0);
			$table->bigInteger('bill_no')->default(0);
			$table->char('coupon_no', 16)->default('');
			$table->integer('coupon_id')->default(0);
			$table->string('used_style', 3)->default('');
			$table->boolean('status')->default(0);
			$table->integer('date_trust')->default(0);
			$table->integer('date_settle')->default(0);
			$table->integer('date_change')->default(0);
			$table->boolean('coupon_flag')->default(0);
			$table->integer('product_id')->default(0);
			$table->integer('branch_id')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_diff_bak');
	}

}

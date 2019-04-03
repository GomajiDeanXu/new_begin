<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEscapeInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('escape_info', function(Blueprint $table)
		{
			$table->integer('escape_id', true);
			$table->integer('purchase_id')->index('purchase_id');
			$table->integer('coupon_id')->index('coupon_id');
			$table->integer('date_checkin')->default(0)->index('date_checkin');
			$table->integer('date_create')->default(0)->index('date_create');
			$table->integer('flag')->default(0)->index('idx_flag');
			$table->float('minus_percent', 4)->default(0.00);
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
		Schema::connection('transaction')->drop('escape_info');
	}

}

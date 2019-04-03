<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvAllowanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('inv_allowance', function(Blueprint $table)
		{
			$table->integer('aid', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_allowance')->default(0);
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('1．寄出
2．待回收');
			$table->integer('allowance_id')->default(0)->index('idx_allowance');
			$table->char('all_type', 1)->default('');
			$table->integer('refund_amount')->default(0);
			$table->integer('refund_number')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('inv_allowance');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewebCashTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('neweb_cash', function(Blueprint $table)
		{
			$table->integer('neweb_id', true);
			$table->integer('cycle')->default(0)->index('idx_cycle');
			$table->integer('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('date_neweb')->default(0)->index('idx_date_neweb');
			$table->integer('amount')->default(0)->index('idx_amount');
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('date_gm')->default(0)->index('idx_date_gm');
			$table->integer('gm_amount')->default(0)->index('idx_amount_gm');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('neweb_cash');
	}

}

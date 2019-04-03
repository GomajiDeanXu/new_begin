<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewebCardTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('neweb_card', function(Blueprint $table)
		{
			$table->integer('neweb_id', true);
			$table->integer('cycle')->default(0)->index('idx_cycle');
			$table->boolean('type')->default(0)->index('idx_type');
			$table->integer('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('date_neweb')->default(0)->index('idx_date_paid');
			$table->integer('amount')->default(0)->index('idx_amount');
			$table->char('agent_type', 8)->default('')->index('idx_agent_type');
			$table->char('approve_code', 6)->default('');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('date_gm')->default(0)->index('idx_gm_date_paid');
			$table->integer('gm_amount')->default(0)->index('idx_amount_gm');
			$table->string('gm_status', 10)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('neweb_card');
	}

}

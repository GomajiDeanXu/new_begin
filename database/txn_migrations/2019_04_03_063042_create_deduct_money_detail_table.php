<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeductMoneyDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('deduct_money_detail', function(Blueprint $table)
		{
			$table->integer('dmd_id', true);
			$table->integer('sf_id')->default(0)->index('idx_sf_id')->comment('transaction.store_finance.sf_id');
			$table->integer('sa_id')->default(0)->index('idx_sa_id')->comment('transaction.store_arrears.sa_id');
			$table->integer('charge_type')->default(0)->comment('0-反核銷費 ∕ 1-SH行銷贊助費');
			$table->integer('fee')->default(0)->comment('扣款金額');
			$table->integer('create_ts')->default(0)->index('idx_create_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('deduct_money_detail');
	}

}

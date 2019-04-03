<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreArrearsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_arrears', function(Blueprint $table)
		{
			$table->integer('sa_id', true);
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('group_id')->default(0)->comment('store_branch_total.branch_id');
			$table->integer('sf_id')->default(0)->index('idx_sf_id')->comment('transaction.store_finance.sf_id');
			$table->integer('charge_type')->default(0)->comment('0-反核銷費 ∕ 1-SH行銷贊助費');
			$table->integer('total_fee')->default(0)->comment('應扣款');
			$table->integer('return_fee')->default(0)->comment('目前實扣金額');
			$table->integer('create_ts')->default(0)->index('idx_create_ts');
			$table->boolean('sm_id')->nullable()->default(0)->comment('2：全家，3：7-11，4：萊爾富');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_arrears');
	}

}

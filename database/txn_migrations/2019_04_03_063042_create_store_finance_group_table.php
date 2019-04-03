<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreFinanceGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_finance_group', function(Blueprint $table)
		{
			$table->integer('sfg_id', true);
			$table->text('sf_ids', 65535)->comment('store_finance.sf_id 集合
以逗點隔開');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_finance_group');
	}

}

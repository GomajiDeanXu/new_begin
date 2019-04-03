<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYmallBranchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ymall_branch', function(Blueprint $table)
		{
			$table->string('ypid', 64)->default('0')->index('index_ypid');
			$table->string('ymall_id', 64)->index('index_ymall_id');
			$table->integer('store_id')->index('index_store_id');
			$table->integer('branch_id')->index('index_branch_id');
			$table->integer('spec_id');
			$table->integer('spec_max_order');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ymall_branch');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsumerRuleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consumer_rule', function(Blueprint $table)
		{
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id')->comment('branch.mbranch_id');
			$table->integer('type')->default(0);
			$table->integer('val')->default(0);
			$table->text('statement', 65535)->comment('消費說明');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consumer_rule');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsumerRuleExtendTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consumer_rule_extend', function(Blueprint $table)
		{
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id')->comment('branch.mbranch_id');
			$table->smallInteger('adult_minconsumption')->nullable()->comment('成人低消限制');
			$table->smallInteger('kids_minconsumption')->nullable()->comment('孩童低消限制');
			$table->smallInteger('kids_minheight')->nullable()->comment('孩童最低身高限制');
			$table->smallInteger('kids_maxheight')->nullable()->comment('孩童最高身高限制');
			$table->smallInteger('kids_minage')->nullable()->comment('孩童最低年齡限制');
			$table->smallInteger('kids_maxage')->nullable()->comment('孩童最高年齡限制');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consumer_rule_extend');
	}

}

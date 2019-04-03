<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupSplitRatioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_split_ratio', function(Blueprint $table)
		{
			$table->integer('split_ratio_id', true)->comment('拆分ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店 ID (對應 gomaji.store_branch_total.branch_id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家 ID (對應 gomaji.store_info.store_id');
			$table->float('ratio', 11, 4)->default(0.0000)->comment('進貨價拆分比');
			$table->float('refund_ratio', 11, 4)->default(0.0000)->comment('退貨價拆分比');
			$table->integer('start_ts')->default(0)->comment('拆分起始生效時間');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(0)->comment('0:刪除
1:正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_split_ratio');
	}

}

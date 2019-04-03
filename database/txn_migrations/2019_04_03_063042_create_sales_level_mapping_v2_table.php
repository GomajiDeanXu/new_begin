<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesLevelMappingV2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_level_mapping_v2', function(Blueprint $table)
		{
			$table->integer('level_id', true)->comment('LEVEL ID');
			$table->boolean('channel')->default(0)->comment('頻道');
			$table->boolean('level')->default(0)->index('level')->comment('等級編號');
			$table->string('level_name', 20)->default('')->index('level_name')->comment('等級名稱');
			$table->integer('goal1')->default(0)->comment('第一階目標件數');
			$table->integer('goal2')->default(0)->comment('第二階目標件數');
			$table->integer('goal_bonus1')->default(0)->comment('第一階目標獎金');
			$table->integer('goal_bonus2')->default(0)->comment('第二階目標獎金');
			$table->integer('month_cycle')->default(0)->index('idx_month_cycle')->comment('月份');
			$table->integer('flag')->default(1)->index('flag')->comment('狀態(0:無效資料1:有效資料)');
			$table->integer('create_ts')->default(0)->index('create_ts')->comment('生效日期');
			$table->integer('cancel_ts')->default(0)->index('cancel_ts')->comment('失效日期');
			$table->string('nick1', 32)->default('')->comment('資料建立者');
			$table->string('nick2', 32)->default('')->comment('資料刪除者');
			$table->string('dep', 10)->default('');
			$table->boolean('type')->default(1)->index('type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_level_mapping_v2');
	}

}

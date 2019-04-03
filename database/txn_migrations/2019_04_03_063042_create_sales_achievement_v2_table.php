<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesAchievementV2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_achievement_v2', function(Blueprint $table)
		{
			$table->integer('sa_id', true)->comment('達成獎金等級ID(FOR ES&SH)');
			$table->boolean('channel')->nullable()->default(0)->index('channel')->comment('頻道');
			$table->boolean('level')->nullable()->default(0)->index('level')->comment('等級');
			$table->integer('achievement')->nullable()->default(0)->comment('等級達成目標');
			$table->integer('flag')->nullable()->default(1)->index('flag')->comment('狀態(0:無效資料1:有效資料)');
			$table->integer('create_ts')->nullable()->default(0)->index('create_ts')->comment('生效日期');
			$table->integer('cancel_ts')->nullable()->default(0)->index('cancel_ts')->comment('失效日期');
			$table->string('nick1', 45)->nullable()->default('')->comment('資料建立者');
			$table->string('nick2', 45)->nullable()->default('')->comment('資料刪除者');
			$table->string('dep', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_achievement_v2');
	}

}

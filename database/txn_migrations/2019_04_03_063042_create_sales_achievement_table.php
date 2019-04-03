<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesAchievementTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_achievement', function(Blueprint $table)
		{
			$table->integer('sa_id', true)->comment('達成獎金等級ID');
			$table->boolean('channel')->nullable()->default(0)->index('channel')->comment('頻道');
			$table->boolean('level')->nullable()->default(0)->index('level')->comment('等級');
			$table->float('start_rate', 10)->nullable()->default(0.00);
			$table->float('end_rate', 4)->nullable()->default(0.00)->comment('達成率截止範圍');
			$table->integer('bonus_amount')->nullable()->default(0)->comment('達成獎金');
			$table->integer('flag')->nullable()->default(1)->index('flag')->comment('狀態(0:無效資料1:有效資料)');
			$table->integer('create_ts')->nullable()->default(0)->index('create_ts')->comment('生效日期');
			$table->integer('cancel_ts')->nullable()->default(0)->index('cancel_ts')->comment('失效日期');
			$table->string('nick1', 45)->nullable()->default('')->comment('資料建立者');
			$table->string('nick2', 45)->nullable()->default('')->comment('資料刪除者');
			$table->string('dep', 10)->default('');
			$table->decimal('start_rate_rev', 10)->default(0.00);
			$table->integer('bonus_amount_rev')->default(0);
			$table->integer('dep_id')->default(0)->comment('部門別(對應gomaji.dep_map, 0為通用)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_achievement');
	}

}

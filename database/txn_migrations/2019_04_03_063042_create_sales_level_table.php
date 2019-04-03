<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesLevelTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_level', function(Blueprint $table)
		{
			$table->integer('sl_id', true)->comment('顧問等級ID');
			$table->boolean('channel')->nullable()->default(0)->index('channel_2')->comment('頻道');
			$table->boolean('level')->nullable()->default(0)->index('level')->comment('等級');
			$table->integer('sales_id')->nullable()->default(0)->index('sales_id_2')->comment('顧問ID');
			$table->integer('month_cycle')->nullable()->default(0)->index('month_cycle')->comment('期間');
			$table->integer('flag')->nullable()->default(1)->index('flag_2')->comment('狀態(0:無效資料1:有效資料)');
			$table->integer('create_ts')->nullable()->default(0)->index('create_ts')->comment('生效日期');
			$table->integer('cancel_ts')->nullable()->default(0)->index('cancel_ts_2')->comment('失效日期');
			$table->string('nick1', 45)->nullable()->default('')->comment('資料建立者');
			$table->string('nick2', 45)->nullable()->default('')->comment('資料刪除者');
			$table->integer('dep_map')->default(0)->index('dep_map');
			$table->integer('manager_id')->default(0)->index('manager_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_level');
	}

}

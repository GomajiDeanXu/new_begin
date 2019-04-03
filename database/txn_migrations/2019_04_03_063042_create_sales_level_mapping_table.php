<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesLevelMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_level_mapping', function(Blueprint $table)
		{
			$table->integer('level_id', true)->comment('LEVEL ID');
			$table->boolean('channel')->default(0)->comment('頻道');
			$table->boolean('level')->default(0)->index('level')->comment('等級編號');
			$table->string('level_name', 20)->default('')->index('level_name')->comment('等級名稱');
			$table->integer('salary')->default(0)->comment('底薪');
			$table->integer('flag')->default(1)->index('flag')->comment('狀態(0:無效資料1:有效資料)');
			$table->integer('create_ts')->default(0)->index('create_ts')->comment('生效日期');
			$table->integer('cancel_ts')->default(0)->index('cancel_ts')->comment('失效日期');
			$table->string('nick1', 32)->default('')->comment('資料建立者');
			$table->string('nick2', 32)->default('')->comment('資料刪除者');
			$table->integer('achievement')->default(0)->comment('業績目標');
			$table->integer('quantity')->default(0);
			$table->string('dep', 10)->default('');
			$table->float('bonus_rate', 4, 4)->nullable();
			$table->integer('max_leads')->default(0)->comment('leads上限');
			$table->integer('achievement_rev')->default(0);
			$table->decimal('rev_rate', 4)->default(0.00);
			$table->index(['channel','level','level_name','salary','flag','create_ts','cancel_ts','achievement'], 'idx_city_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_level_mapping');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDailyRatingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('daily_rating', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('date_ts')->default(0)->index('idx_date_ts')->comment('日期
年月日的timestamp');
			$table->boolean('type')->default(0)->comment('類型
1: GID
2: SID');
			$table->boolean('ch')->default(0)->index('idx_ch')->comment('頻道id11: 舊BB＆買單優惠');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('gomaji.store_info.store_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gomaji.store_branch_total.branch_id');
			$table->boolean('rating')->default(0)->index('idx_rating')->comment('分數
1~5');
			$table->integer('daily_rating')->default(0)->comment('每日評價分數總計');
			$table->integer('daily_count')->default(0)->comment('每日評價次數總計');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('update_ts')->default(0)->comment('更新時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('daily_rating');
	}

}

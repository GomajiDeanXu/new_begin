<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppLeaderboardSetTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_leaderboard_set', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('ch')->default(0)->index('ch_idx')->comment('頻道');
			$table->string('leaderboard_name', 20)->comment('排行榜名稱');
			$table->integer('leaderboard_category_id')->default(0)->index('leaderboard_category_id_idx')->comment('排行榜類型id');
			$table->boolean('calculate_days')->default(1)->comment('計算的天數');
			$table->boolean('top_number')->default(1)->comment('排行的名次數');
			$table->integer('condition')->default(0)->comment('排行條件 bitwise 1:含分次分異 2:含當次銷售 4:含紙本餐券 8:只計算飯店住宿、民宿住宿檔次 16:只計算買單優惠');
			$table->string('image', 100)->default('')->comment('類別圖片');
			$table->boolean('display')->default(1)->comment('0:隱藏 1:顯示');
			$table->integer('sort')->default(0)->comment('排序');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_leaderboard_set');
	}

}

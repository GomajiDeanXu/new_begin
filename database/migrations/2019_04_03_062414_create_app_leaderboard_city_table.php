<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppLeaderboardCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_leaderboard_city', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('app_leaderboard_set_id')->default(0)->index('app_cateogry_set_id_idx')->comment('排行榜條件id');
			$table->integer('city_id')->default(0)->index('city_id_idx')->comment('城市id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_leaderboard_city');
	}

}

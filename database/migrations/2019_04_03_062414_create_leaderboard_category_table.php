<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaderboardCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leaderboard_category', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('1:銷量份數最高 2:店家評價最高');
			$table->string('category_name', 20)->comment('名稱 根據Primary Key 1:銷量份數最高 2:店家評價最高');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leaderboard_category');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spot', function(Blueprint $table)
		{
			$table->integer('spot_id', true)->comment('景點ID');
			$table->boolean('region')->default(0)->index('idx_region')->comment('地區(0: 未列入分區 / 1: 北部地區 / 2: 中部地區 / 3: 南部地區 / 4: 花東地區)');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('景點所在城市(若為國外則歸在旅遊)');
			$table->string('spot_name', 36)->nullable()->comment('景點名稱');
			$table->boolean('flag')->default(0)->comment('(0: 刪除 / 1: 正常)');
			$table->integer('dist_group_id')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('spot');
	}

}

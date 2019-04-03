<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaSpotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ota_spot', function(Blueprint $table)
		{
			$table->increments('id')->comment('id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gid');
			$table->integer('ota_spot_id')->default(0)->index('idx_ota_spot_id')->comment('spot_id');
			$table->boolean('region')->default(0)->comment('地區(0: 未列入分區 / 1: 北部地區 / 2: 中部地區 / 3: 南部地區 / 4: 花東地區)');
			$table->integer('dist_group_id')->default(0);
			$table->integer('flag')->nullable()->default(1)->comment('0: 未使用 / 1: 使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ota_spot');
	}

}

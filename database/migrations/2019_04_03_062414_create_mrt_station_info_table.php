<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMrtStationInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mrt_station_info', function(Blueprint $table)
		{
			$table->integer('station_id', true);
			$table->integer('mrt_route_id')->default(0)->index('idx_mrt_route_id')->comment('mrt_route.mrt_route_id');
			$table->string('station_name', 45)->default('')->index('idx_station_name')->comment('捷運站名');
			$table->string('address', 45)->default('')->comment('地址');
			$table->float('lat', 10, 0)->default(0)->comment('中心點緯度');
			$table->float('lng', 10, 0)->default(0)->comment('中心點經度');
			$table->boolean('display')->default(0)->index('idx_display')->comment('0: 不顯示
1: 顯示');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0: 停用
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mrt_station_info');
	}

}

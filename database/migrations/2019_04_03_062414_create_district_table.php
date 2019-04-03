<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistrictTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('district', function(Blueprint $table)
		{
			$table->integer('district_id', true)->comment('商圈ID');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('商圈所在城市ID');
			$table->string('district_name', 12)->default('')->index('idx_district_name')->comment('商圈名稱');
			$table->string('sign', 20)->default('')->comment('商圈的中心點');
			$table->string('address', 45)->nullable()->comment('中心點的地址');
			$table->float('lat', 10, 0)->default(0)->comment('中心點緯度');
			$table->float('lng', 10, 0)->default(0)->comment('中心點經度');
			$table->boolean('display')->default(0)->index('idx_display')->comment('0: 不顯示
1: 顯示');
			$table->integer('flag')->default(1)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('district');
	}

}

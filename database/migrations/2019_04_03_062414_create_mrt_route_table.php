<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMrtRouteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mrt_route', function(Blueprint $table)
		{
			$table->integer('mrt_route_id', true);
			$table->integer('city_id')->default(0);
			$table->string('route_name', 45)->default('')->index('idx_route_name')->comment('路線名稱');
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
		Schema::drop('mrt_route');
	}

}

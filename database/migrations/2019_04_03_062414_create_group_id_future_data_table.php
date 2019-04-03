<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupIdFutureDataTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('group_id_future_data', function(Blueprint $table)
		{
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('團購 產品ID gomaji.products.product_id');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id')->comment('BB 產品ID m4300.branch.mbranch_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('gid gomaji.store_branch_total.branch_id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID gomaji.store_info.store_id');
			$table->integer('dist_group_id')->default(0)->index('idx_dist_group_id')->comment('行政區id gomaji.dist_group_list.dist_group_id');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('城市ID gomaji.city.city_id');
			$table->string('sub_city_ids', 80)->nullable()->default('')->comment('借檔城市 gomaji.city.city_id');
			$table->boolean('ch')->default(0)->index('idx_ch')->comment('refer gomaji.channel_map.channel');
			$table->float('lat', 10, 0)->default(0)->index('idx_lat')->comment('緯度 gomaji.store_branch_total.lat');
			$table->float('lng', 10, 0)->default(0)->index('idx_lng')->comment('經度 gomaji.store_branch_total.lng');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀況 0: 停用 1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('group_id_future_data');
	}

}

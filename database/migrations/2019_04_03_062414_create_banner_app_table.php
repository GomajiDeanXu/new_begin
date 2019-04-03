<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerAppTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_app', function(Blueprint $table)
		{
			$table->integer('ba_id', true);
			$table->integer('bi_id')->default(0)->index('idx_bi_id')->comment('banner_info.bi_id');
			$table->integer('product_id')->default(0)->comment('banner_info.product_id');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0:不可用
1:可用');
			$table->integer('group_id')->nullable();
			$table->integer('hotel_id')->default(0)->comment('OTA店家id');
			$table->integer('mbranch_id')->nullable()->default(0)->comment('買單ID(m4300.branch.mbranch_id)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_app');
	}

}

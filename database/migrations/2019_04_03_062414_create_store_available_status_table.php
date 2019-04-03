<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreAvailableStatusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_available_status', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('store_id')->index('idx_store_id')->comment('總店ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店ID');
			$table->integer('product_id')->nullable()->index('idx_product_id')->comment('商品ID');
			$table->integer('start_ts')->default(0)->index('idx_start_ts')->comment('綠燈開始時間');
			$table->integer('end_ts')->default(0)->index('idx_end_ts')->comment('綠燈結束時間');
			$table->integer('update_ts')->default(0)->comment('狀態更新時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_available_status');
	}

}

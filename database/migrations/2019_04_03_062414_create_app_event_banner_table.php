<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppEventBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_event_banner', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('category_id')->default(0)->comment('gomaji.product_category.category_id');
			$table->integer('tag_id')->default(0)->comment('gomaji.tags.tag_id');
			$table->string('title_name', 20)->comment('特別企劃名稱');
			$table->string('image', 100)->comment('特別企劃圖片');
			$table->integer('start_ts')->comment('起始時間');
			$table->integer('end_ts')->comment('結束時間');
			$table->boolean('flag')->default(1)->comment('0: 停用 1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_event_banner');
	}

}

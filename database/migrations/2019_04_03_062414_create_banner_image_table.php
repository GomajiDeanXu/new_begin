<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerImageTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_image', function(Blueprint $table)
		{
			$table->increments('bi_id');
			$table->boolean('ch')->default(0);
			$table->integer('item_id')->unsigned()->comment('Tag&Category ID');
			$table->boolean('type')->nullable()->default(0)->comment('類別 1:tags 2:Product_category 3:mk');
			$table->string('title')->nullable()->comment('特別企劃tag值');
			$table->string('subject')->nullable()->comment('標題');
			$table->integer('publish_status')->nullable()->comment('上架狀態');
			$table->boolean('target_status')->nullable()->default(0)->comment('1.另開分頁 2 本頁開啟');
			$table->string('image_type')->nullable()->comment('圖片型態');
			$table->integer('banner_start_ts')->nullable()->default(0);
			$table->integer('banner_end_ts')->nullable()->default(0);
			$table->string('ref', 20)->default('');
			$table->string('activity_url')->nullable()->comment('活動 url');
			$table->boolean('flag')->default(1)->comment('0:不可用 1:可用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_image');
	}

}

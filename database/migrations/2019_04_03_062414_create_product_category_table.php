<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_category', function(Blueprint $table)
		{
			$table->integer('category_id', true)->comment('商品類別ID');
			$table->boolean('category_channel')->default(1)->comment('類別所屬BU');
			$table->boolean('category_ch')->comment('新版ch對照categoryl');
			$table->string('category_name', 45)->nullable()->comment('類別名稱');
			$table->boolean('flag')->default(1)->comment('(0: 刪除 / 1: 正常)');
			$table->boolean('type')->default(0)->comment('(0: 一般商品適用 / 1: 宅配商品適用)');
			$table->integer('event_start_ts')->nullable()->default(0);
			$table->integer('event_end_ts')->nullable()->default(0);
			$table->integer('sorts')->default(0)->comment('用於各個頻道做排序，event系列不列入排列');
			$table->boolean('use_css')->default(0)->comment('控制前台css');
			$table->string('preset', 45)->default('')->comment('湊熱鬧預設文字');
			$table->integer('hide_start_ts')->default(0)->comment('category 隱藏開始時間');
			$table->integer('hide_end_ts')->default(0)->comment('category 隱藏結束時間');
			$table->integer('qualification')->default(0)->comment('條件 bitwise 2:活動 Tag 顯示在熱門類別');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_category');
	}

}

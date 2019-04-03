<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner', function(Blueprint $table)
		{
			$table->integer('banner_id', true);
			$table->string('category_ids', 128)->nullable()->comment('banner版位ID');
			$table->string('city_ids', 128)->nullable()->comment('分區的city_id(以逗號分隔)');
			$table->string('img', 131)->default('')->comment('banner圖片URL');
			$table->text('message', 65535)->nullable()->comment('文字內容(顯示在圖片後面)');
			$table->string('link')->nullable()->comment('banner的連結');
			$table->string('title', 45)->nullable()->comment('連結提示文字');
			$table->boolean('target')->default(0)->comment('連結target(0: _blank / 1: _self)');
			$table->boolean('lightbox')->default(0)->comment('連結以lightbox方式呈現');
			$table->integer('start_ts')->default(0)->comment('有效期限(開始)');
			$table->integer('end_ts')->default(0)->comment('有效期限(結束)');
			$table->integer('product_id')->default(0)->comment('商品ID');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner');
	}

}

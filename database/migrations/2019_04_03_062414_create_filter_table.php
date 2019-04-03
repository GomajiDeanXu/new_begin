<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilterTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('filter', function(Blueprint $table)
		{
			$table->smallInteger('filter_id', true)->unsigned();
			$table->boolean('channel')->default(0)->index('idx_channel')->comment('頻道(channel_map)');
			$table->string('filter_name', 45)->nullable()->comment('分類類別名稱');
			$table->string('categorys', 45)->nullable()->index('idx_categorys')->comment('商品類別(category_id)');
			$table->string('tags', 45)->nullable()->index('idx_tags')->comment('標籤(tag_ids)');
			$table->boolean('flag')->default(1)->index('flag')->comment('資料使用範圍(bitwise)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('filter');
	}

}

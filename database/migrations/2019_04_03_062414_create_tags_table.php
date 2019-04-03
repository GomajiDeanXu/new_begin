<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tags', function(Blueprint $table)
		{
			$table->integer('tag_id', true)->comment('標籤ID');
			$table->string('tag_name', 16)->nullable()->comment('標籤名稱');
			$table->integer('tag_click_count')->nullable()->default(0)->comment('標籤點擊數(無使用)');
			$table->boolean('flag')->default(0)->comment('(0: 刪除 / 1: 正常)');
			$table->boolean('ch')->default(0);
			$table->boolean('type')->default(0);
			$table->integer('event_start_ts')->default(0)->comment('tag起始日');
			$table->integer('event_end_ts')->default(0)->comment('tag結束日');
			$table->integer('sorts')->default(0)->comment('用於各個頻道做排序，event系列不列入排列');
			$table->boolean('use_css')->default(0)->comment('控制前台css');
			$table->char('mcc_code', 4)->default(5812)->index('idx_mcc_code')->comment('mcc_code');
			$table->string('preset', 45)->default('')->comment('湊熱鬧預設文字');
			$table->integer('qualification')->default(0)->comment('條件 bitwise 1:One App專用：PC、mweb設定為不顯示，只有APP可出現, bitwise 2:活動 Tag 顯示在熱門類別');
			$table->integer('hide_start_ts')->default(0)->comment('tag 隱藏開始時間');
			$table->integer('hide_end_ts')->default(0)->comment('tag 隱藏結束時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tags');
	}

}

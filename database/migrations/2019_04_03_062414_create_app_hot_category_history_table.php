<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppHotCategoryHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_hot_category_history', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('ch')->default(0)->index('ch_idx')->comment('頻道');
			$table->integer('category_id')->default(0)->comment('類別id');
			$table->integer('tag_id')->default(0)->comment('標籤id');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('sort')->default(0)->comment('排序');
			$table->string('editor', 50)->nullable()->comment('最後編輯人');
			$table->integer('history_ts')->default(0)->comment('記錄的時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_hot_category_history');
	}

}

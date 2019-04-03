<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLivelyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lively', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('ch')->default(0)->comment('頻道');
			$table->boolean('block')->default(0)->comment('1:小圖區
2:文字區');
			$table->integer('category_id')->default(0)->index('category_id_idx')->comment('湊熱鬧類別id
gomaji.product_category.category_id');
			$table->integer('tag_id')->default(0)->comment('gomaji.tags.tag_id');
			$table->string('category_description', 50)->comment('湊熱鬧類別文字描述');
			$table->integer('date_ts')->default(0)->comment('顯示日期');
			$table->integer('sort')->default(0)->comment('排序');
			$table->string('editor', 45)->comment('編輯者');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('modify_ts')->default(0)->comment('最後修改時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lively');
	}

}

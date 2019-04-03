<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppHotCategoryLimitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('app_hot_category_limit', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->integer('ch')->default(0)->index('ch_idx')->comment('頻道');
			$table->boolean('limit_number')->default(0)->comment('限制數量');
			$table->integer('modify_ts')->default(0)->comment('最後修改時間');
			$table->string('editor', 50)->nullable()->comment('最後編輯人');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('app_hot_category_limit');
	}

}

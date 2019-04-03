<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_category', function(Blueprint $table)
		{
			$table->integer('category_id', true)->comment('banner版位ID');
			$table->string('category_name', 45)->default('')->comment('版位名稱');
			$table->string('file_name', 45)->default('')->comment('產生的js檔名');
			$table->boolean('flag')->default(0)->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_category');
	}

}

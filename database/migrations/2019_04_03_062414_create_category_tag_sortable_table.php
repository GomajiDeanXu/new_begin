<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryTagSortableTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category_tag_sortable', function(Blueprint $table)
		{
			$table->increments('ct_id');
			$table->integer('auto_id')->default(0)->comment('對照各種type的auto increament');
			$table->boolean('ch')->nullable()->default(0)->comment('refer gomaji.channel_map.channel');
			$table->boolean('type')->default(0)->comment('1: 使用 gomaji.product_category 資料表
2: 使用 gomaji.tags 資料表');
			$table->boolean('user')->default(0)->comment('使用者');
			$table->smallInteger('sortable')->default(0)->comment('排序');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(1)->comment('0: 停用
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category_tag_sortable');
	}

}

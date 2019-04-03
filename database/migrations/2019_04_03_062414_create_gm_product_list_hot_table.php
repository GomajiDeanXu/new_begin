<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGmProductListHotTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gm_product_list_hot', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('sort_id')->index('idx_sort_id');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('ch')->default(0);
			$table->integer('city_id')->default(0);
			$table->integer('category_id')->default(0);
			$table->integer('dist_group_id')->default(0);
			$table->integer('tag_id')->default(0);
			$table->integer('region_id')->default(0);
			$table->integer('create_ts')->default(0)->index('idx_create_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gm_product_list_hot');
	}

}

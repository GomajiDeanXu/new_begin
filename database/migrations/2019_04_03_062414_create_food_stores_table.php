<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodStoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_stores', function(Blueprint $table)
		{
			$table->increments('food_store_id');
			$table->integer('block_id')->unsigned()->default(0)->comment('food_blocks.block_id');
			$table->integer('store_id')->unsigned()->default(0)->comment('store_info.store_id');
			$table->string('description', 250)->nullable()->comment('描述文字');
			$table->string('url', 250)->nullable()->comment('連結');
			$table->string('img', 250)->nullable()->comment('圖片URL');
			$table->boolean('store_order')->default(0)->comment('店家在該板位的順序');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('food_stores');
	}

}

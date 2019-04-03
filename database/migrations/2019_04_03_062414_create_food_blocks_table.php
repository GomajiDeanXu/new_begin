<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFoodBlocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('food_blocks', function(Blueprint $table)
		{
			$table->increments('block_id');
			$table->string('block_title', 20)->nullable()->comment('區塊標題');
			$table->smallInteger('max_stores')->unsigned()->default(1)->comment('區塊的店家數上限');
			$table->string('comment', 50)->nullable();
			$table->boolean('title_editable')->default(0)->comment('標題可修改');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('food_blocks');
	}

}

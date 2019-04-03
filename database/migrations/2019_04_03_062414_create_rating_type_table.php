<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRatingTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rating_type', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('評價特色id');
			$table->string('comment_type', 45)->default('')->comment('特色推薦類別');
			$table->boolean('flag')->default(1)->comment('(0: 刪除 / 1: 正常)');
			$table->integer('sort')->default(0)->comment('排序');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rating_type');
	}

}

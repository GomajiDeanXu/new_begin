<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHerstContentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('herst_content', function(Blueprint $table)
		{
			$table->increments('herst_content_id');
			$table->string('store_desc', 24);
			$table->string('product_desc', 24);
			$table->string('pic_b', 64);
			$table->string('pic_s', 64);
			$table->string('block_area', 10);
			$table->string('block_store_name');
			$table->text('intro', 65535);
			$table->integer('sort')->unsigned()->nullable()->default(0);
			$table->boolean('isnew')->nullable()->default(0);
			$table->boolean('display')->nullable()->default(0);
			$table->integer('create_ts')->unsigned()->nullable()->default(0);
			$table->boolean('flag')->nullable()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('herst_content');
	}

}

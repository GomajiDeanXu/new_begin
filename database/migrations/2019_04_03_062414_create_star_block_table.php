<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarBlockTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('star_block', function(Blueprint $table)
		{
			$table->increments('block_id');
			$table->string('area', 8);
			$table->string('title', 64);
			$table->string('pic_1', 128);
			$table->string('pic_2', 128)->nullable()->default('');
			$table->string('pic_text_2', 128)->nullable()->default('');
			$table->text('intro', 65535);
			$table->integer('create_ts')->unsigned()->nullable()->default(0);
			$table->integer('sort')->unsigned()->nullable()->default(0);
			$table->boolean('display')->nullable()->default(0);
			$table->boolean('flag')->nullable()->default(0);
			$table->boolean('ch')->nullable()->default(0)->comment('refer gomaji.channel_map.channel');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('star_block');
	}

}

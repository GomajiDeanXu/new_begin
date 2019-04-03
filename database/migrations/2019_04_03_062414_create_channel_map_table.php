<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('channel_map', function(Blueprint $table)
		{
			$table->integer('channel', true)->comment('頻道ID');
			$table->string('ch_name', 16)->default('')->comment('頻道名稱(中文)');
			$table->string('en_name', 16)->default('')->comment('頻道名稱(英文)');
			$table->boolean('flag');
			$table->string('bu', 8);
			$table->boolean('use_css')->default(0)->comment('控制前台css');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('channel_map');
	}

}

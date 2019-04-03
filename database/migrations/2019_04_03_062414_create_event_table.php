<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEventTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event', function(Blueprint $table)
		{
			$table->integer('event_id', true)->comment('活動ID');
			$table->string('event_name', 45)->default('')->comment('活動名稱(英文)');
			$table->string('event_desc', 45)->nullable()->comment('活動名稱(中文，辨識用)');
			$table->boolean('flag')->default(1)->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('event');
	}

}

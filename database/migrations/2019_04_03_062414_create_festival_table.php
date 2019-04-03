<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFestivalTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('festival', function(Blueprint $table)
		{
			$table->integer('fest_id', true)->comment('節日ID');
			$table->string('fest_name', 24)->default('')->comment('節日名稱');
			$table->string('fest_date', 12)->nullable()->comment('節日的日期');
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
		Schema::drop('festival');
	}

}

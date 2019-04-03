<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStarBlockPidTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('star_block_pid', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('block_id')->unsigned()->nullable()->default(0)->index('idx_block_id');
			$table->string('pid');
			$table->string('start_ts', 10);
			$table->string('end_ts', 10);
			$table->boolean('flag')->nullable()->default(0);
			$table->string('sid', 10)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('star_block_pid');
	}

}

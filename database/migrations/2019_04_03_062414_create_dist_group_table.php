<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dist_group', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dist_group_id')->unsigned()->default(0)->index('idx_dist_group_id');
			$table->smallInteger('postal_code')->unsigned()->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dist_group');
	}

}

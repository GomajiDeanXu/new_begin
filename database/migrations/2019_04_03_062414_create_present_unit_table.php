<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_unit', function(Blueprint $table)
		{
			$table->increments('pu_id');
			$table->string('pu_name')->comment('品項');
			$table->boolean('flag')->default(0)->comment('1.有效:0.無效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_unit');
	}

}

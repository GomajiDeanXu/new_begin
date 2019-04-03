<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityHamiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('city_hami', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('city_id')->default(0)->comment('GOMAJI城市ID');
			$table->string('hami_city_id', 16)->default('')->comment('hami城市ID');
			$table->string('hami_city_name', 36)->default('')->comment('hami城市名稱');
			$table->boolean('flag')->nullable()->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('city_hami');
	}

}

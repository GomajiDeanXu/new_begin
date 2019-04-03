<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostalCityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postal_city', function(Blueprint $table)
		{
			$table->boolean('postal_city_id')->primary();
			$table->string('gov_name', 45)->nullable()->comment('行政區縣、市完整名稱');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('postal_city');
	}

}

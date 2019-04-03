<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRestrictedCategoryBuy123Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('restricted_category_buy123', function(Blueprint $table)
		{
			$table->integer('categoryid')->unsigned()->primary();
			$table->string('categoryname')->nullable();
			$table->dateTime('last_updated_datetime')->default('0000-00-00 00:00:00');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('restricted_category_buy123');
	}

}

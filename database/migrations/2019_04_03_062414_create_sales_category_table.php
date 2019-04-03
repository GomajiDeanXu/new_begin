<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sales_category', function(Blueprint $table)
		{
			$table->increments('sales_category_id');
			$table->integer('sales_id')->unsigned()->default(0);
			$table->integer('category_id')->unsigned()->default(0);
			$table->boolean('flag')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sales_category');
	}

}

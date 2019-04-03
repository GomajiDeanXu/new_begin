<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsAttributeTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_attribute_type', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('1:每日一團');
			$table->string('en_name', 50)->comment('attribute_type的英文名稱，如:daily_prod');
			$table->string('ch_name', 50)->comment('attribute_type的中文名稱，如:每日一團');
			$table->boolean('flag')->default(1)->comment('0: 停用 1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_attribute_type');
	}

}

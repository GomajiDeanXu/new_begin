<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoryHamiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_category_hami', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('category_id')->default(0)->comment('GOMAJI商品類別ID');
			$table->string('hami_category_id', 16)->default('')->comment('hami商品類別ID');
			$table->string('hami_category_name', 45)->default('')->comment('類別名稱');
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
		Schema::drop('product_category_hami');
	}

}

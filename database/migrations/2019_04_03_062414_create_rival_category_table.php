<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRivalCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rival_category', function(Blueprint $table)
		{
			$table->integer('category_id', true)->comment('競業商品類別ID');
			$table->boolean('category_ch')->default(1)->comment('類別所屬BU');
			$table->string('category_name', 45)->nullable()->comment('類別名稱');
			$table->boolean('flag')->default(1)->comment('(0: 刪除 / 1: 正常)');
			$table->integer('product_category_id')->default(1)->comment('refer product_category.product_category_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rival_category');
	}

}

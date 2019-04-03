<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tag_products', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('百大熱銷ID');
			$table->boolean('ch')->default(1)->index('idx_ch')->comment('所屬BU');
			$table->integer('product_id')->index('idx_product_id')->comment('products.product_id');
			$table->integer('date_time')->default(0)->comment('百大熱銷日期');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(1)->comment('0: 刪除 / 1: 正常');
			$table->integer('tag_id')->default(0)->index('idx_tag_id')->comment('product_category.category_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tag_products');
	}

}

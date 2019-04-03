<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDistGroupProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('dist_group_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('dist_group_id')->unsigned()->default(0)->index('idx_dist_group_id')->comment('dist_group_list.dist_group_id');
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id')->comment('products.product_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('dist_group_products');
	}

}

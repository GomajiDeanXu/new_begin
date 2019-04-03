<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGmProductListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gm_product_list', function(Blueprint $table)
		{
			$table->integer('sort_id')->index('idx_sort_id');
			$table->integer('product_id')->index('idx_product_id');
			$table->integer('sort')->default(0)->comment('商品排序');
			$table->integer('create_ts')->default(0);
			$table->primary(['sort_id','product_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gm_product_list');
	}

}

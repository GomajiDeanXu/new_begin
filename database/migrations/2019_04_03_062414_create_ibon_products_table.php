<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIbonProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ibon_products', function(Blueprint $table)
		{
			$table->integer('product_id')->index('index_product_id')->comment('商品ID');
			$table->integer('create_ts')->comment('新增時間');
			$table->integer('change_ts')->comment('修改時間');
			$table->integer('flag')->index('index_flag')->comment('分類狀態(bitwise)');
			$table->integer('status')->index('index_status')->comment('0:商品下架 / 1:商品上架');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ibon_products');
	}

}

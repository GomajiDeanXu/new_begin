<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateYmallProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ymall_products', function(Blueprint $table)
		{
			$table->string('ypid', 64)->index('index_ypid');
			$table->string('ymall_id', 64)->index('index_ymall_id');
			$table->integer('product_id')->index('index_product_id');
			$table->integer('sp_id')->index('index_sp_id');
			$table->integer('create_ts');
			$table->integer('flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ymall_products');
	}

}

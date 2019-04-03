<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductFsRatioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_fs_ratio', function(Blueprint $table)
		{
			$table->integer('product_id')->unique('uni_product_id')->comment('product_id');
			$table->float('fs_ratio', 11, 4)->default(0.0000)->comment('五星贊助費');
			$table->integer('create_ts');
			$table->boolean('flag')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_fs_ratio');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBigdealsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bigdeals', function(Blueprint $table)
		{
			$table->increments('bd_id');
			$table->integer('sort_ts')->default(0)->comment('要排序的日期');
			$table->boolean('sort_type')->default(1)->comment('類別(1: 商品排序 / 2: 手機今日限時團購 / 3: 手機更多人氣團購)');
			$table->enum('area', array('N','C','S'))->default('N')->comment('地區(N: 北部 / C: 中部 / S: 南部)');
			$table->boolean('rank')->default(1)->comment('排序的順序');
			$table->integer('product_id')->unsigned()->default(0)->comment('products.product_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bigdeals');
	}

}

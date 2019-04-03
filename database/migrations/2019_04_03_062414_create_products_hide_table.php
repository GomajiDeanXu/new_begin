<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsHideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_hide', function(Blueprint $table)
		{
			$table->integer('hide_id', true)->comment('流水號 ID');
			$table->integer('product_id')->default(0)->index('idx_pid')->comment('商品 PID');
			$table->dateTime('start_dt')->comment('隱藏開始時間');
			$table->dateTime('end_dt')->comment('隱藏結束時間');
			$table->integer('original_display')->nullable()->default(0)->comment('原先設定的顯示值 (products.display)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_hide');
	}

}

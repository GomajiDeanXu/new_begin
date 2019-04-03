<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductDisplayHistoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_display_history', function(Blueprint $table)
		{
			$table->integer('pd_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('gomaji.products.product_id');
			$table->integer('display')->default(0)->index('idx_display')->comment('gomaji.products.display');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('建立時間');
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
		Schema::drop('product_display_history');
	}

}

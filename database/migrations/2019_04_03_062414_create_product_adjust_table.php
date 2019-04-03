<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductAdjustTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_adjust', function(Blueprint $table)
		{
			$table->increments('aid');
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('sp_id')->default(0);
			$table->integer('branch_id')->unsigned()->default(0)->comment('store_branch_info.branch_id');
			$table->integer('city_id')->unsigned()->default(0);
			$table->boolean('type')->default(0)->index('idx_type');
			$table->boolean('flag')->default(0);
			$table->string('val', 20)->nullable();
			$table->integer('date_create')->unsigned()->default(0);
			$table->integer('extra_ts')->unsigned()->default(0);
			$table->string('nick', 32)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_adjust');
	}

}

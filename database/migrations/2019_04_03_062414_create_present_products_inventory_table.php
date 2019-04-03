<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentProductsInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_products_inventory', function(Blueprint $table)
		{
			$table->increments('ppi_id');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('present_products.present_id');
			$table->string('ppu_id')->comment('present_products_unit.ppu_id');
			$table->string('item_no')->comment('庫存名稱');
			$table->integer('max_order_no')->unsigned()->default(0)->comment('總量');
			$table->integer('sp_id')->unsigned()->default(0)->index('idx_sp_id')->comment('present_sub_products.sp_id');
			$table->integer('g_id')->unsigned()->default(0)->comment('group_id');
			$table->boolean('flag')->default(0)->comment('1.有效:0.無效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_products_inventory');
	}

}

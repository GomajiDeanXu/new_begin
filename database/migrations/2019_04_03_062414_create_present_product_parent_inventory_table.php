<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentProductParentInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_product_parent_inventory', function(Blueprint $table)
		{
			$table->integer('pppi_id', true);
			$table->integer('inventory_id')->default(0)->index('idx_inventory_id')->comment('product_inventory.inventory_id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id')->comment('product_inventory.sp_id');
			$table->string('item_name', 128)->default('')->comment('product_inventory.item_name');
			$table->string('item_no', 64)->default('')->comment('product_inventory.item_no');
			$table->string('punit_id')->default('')->index('idx_punit_id')->comment('product_unit.punit_id

ex: 1,2,3');
			$table->integer('max_order_no')->default(0)->comment('product_inventory.max_order_no');
			$table->integer('order_no')->default(0)->comment('product_inventory.order_no');
			$table->integer('group_id')->default(0)->comment('做群組區分');
			$table->boolean('flag')->default(1)->comment('product_inventory.flag');
			$table->integer('order_no2')->nullable()->default(0)->comment('product_inventory.order_no2');
			$table->integer('max_order_no2')->default(0)->comment('product_inventory.max_order_no2');
			$table->boolean('stop')->default(0)->index('idx_stop')->comment('鎖停1有效0無效');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('present_products.present_id');
			$table->integer('psp_id')->unsigned()->default(0)->index('idx_psp_id')->comment('present_sub_products.sp_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_product_parent_inventory');
	}

}

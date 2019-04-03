<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductInventoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_inventory', function(Blueprint $table)
		{
			$table->integer('inventory_id', true);
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->string('item_name', 128)->default('');
			$table->string('item_no', 64)->default('');
			$table->string('punit_id')->default('')->index('idx_punit_id')->comment('product_unit.punit_id

ex: 1,2,3');
			$table->integer('max_order_no')->default(0);
			$table->integer('order_no')->default(0);
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('做群組區分');
			$table->boolean('flag')->default(1);
			$table->integer('order_no2')->nullable()->default(0);
			$table->integer('max_order_no2')->default(0);
			$table->boolean('stop')->default(0)->index('idx_stop')->comment('鎖停1有效0無效');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_inventory');
	}

}

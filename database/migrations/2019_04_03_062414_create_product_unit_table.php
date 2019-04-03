<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_unit', function(Blueprint $table)
		{
			$table->integer('punit_id', true);
			$table->string('inventory_id')->default('')->index('idx_inventory_id')->comment('product_inventory.inventory_id
ex: 1,2,3');
			$table->integer('unit_id')->default(0)->index('idx_unit_id')->comment('unit_map.unit_id');
			$table->string('punit_val')->default('');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->integer('group_id')->default(0)->index('idx_group_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_unit');
	}

}

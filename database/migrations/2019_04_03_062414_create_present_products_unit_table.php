<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePresentProductsUnitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('present_products_unit', function(Blueprint $table)
		{
			$table->increments('ppu_id');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('present_products.present_id');
			$table->integer('pu_id')->unsigned()->default(0)->comment('present_unit.pu_id');
			$table->string('ppu_val')->comment('數量');
			$table->boolean('flag')->default(0)->comment('1.有效:0.無效');
			$table->string('sp_ids', 32)->default('')->comment('gomaji.present_sub_products.sp_id:方案上限為10個:分隔符號,');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('present_products_unit');
	}

}

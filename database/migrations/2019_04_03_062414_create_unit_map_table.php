<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUnitMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('unit_map', function(Blueprint $table)
		{
			$table->integer('unit_id', true);
			$table->string('unit_name', 128)->default('')->comment('種類名');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->boolean('flag')->default(1)->comment('1: 可用
0: 不可用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('unit_map');
	}

}

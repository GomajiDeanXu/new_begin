<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSpotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_spots', function(Blueprint $table)
		{
			$table->integer('product_id')->index('idx_pid');
			$table->integer('spot_id')->index('idx_tid');
			$table->boolean('flag')->default(1);
			$table->unique(['product_id','spot_id'], 'idx_ptid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_spots');
	}

}

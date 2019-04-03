<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductSpotsTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_spots_tmp', function(Blueprint $table)
		{
			$table->integer('rts_id')->index('idx_rts_id');
			$table->integer('spot_id')->index('idx_tid');
			$table->unique(['rts_id','spot_id'], 'idx_rtid');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_spots_tmp');
	}

}

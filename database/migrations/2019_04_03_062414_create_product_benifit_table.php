<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductBenifitTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_benifit', function(Blueprint $table)
		{
			$table->increments('pb_id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('PID');
			$table->integer('start_ts')->default(0)->comment('開始時間');
			$table->integer('end_ts')->default(0)->comment('結束時間');
			$table->float('discount_percentage', 3)->default(1.00)->comment('折數');
			$table->integer('flag')->default(1)->comment('bitwise: 1上架');
			$table->index(['start_ts','end_ts'], 'idx_start_ts');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_benifit');
	}

}

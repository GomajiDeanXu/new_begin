<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLivelyRecordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lively_records', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('lively_id')->default(0)->index('idx_lively_id')->comment('lively.id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('gomaji.products.product_id');
			$table->integer('sort')->default(0)->index('idx_sort')->comment('排序');
			$table->integer('create_ts')->default(0)->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lively_records');
	}

}

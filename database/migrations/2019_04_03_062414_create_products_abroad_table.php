<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsAbroadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_abroad', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned()->nullable()->default(0)->index('idx_product_id');
			$table->integer('sp_id')->unsigned()->nullable()->default(0)->index('idx_sp_id');
			$table->integer('source')->unsigned()->nullable()->default(0)->index('idx_source');
			$table->boolean('approval')->nullable()->default(0)->index('idx_approval');
			$table->boolean('reason')->nullable()->default(0)->index('idx_reason');
			$table->string('reason_memo');
			$table->string('memo');
			$table->integer('mail_ts')->unsigned()->nullable()->default(0);
			$table->boolean('flag')->nullable()->default(0)->index('idx_flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_abroad');
	}

}

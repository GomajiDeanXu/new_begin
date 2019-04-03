<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductContractAdditionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_contract_addition', function(Blueprint $table)
		{
			$table->increments('pca_id');
			$table->integer('product_id')->nullable()->index('idx_product_id')->comment('商品ID');
			$table->string('comment', 128)->nullable()->comment('補約內容');
			$table->integer('comment_ts')->unsigned()->nullable()->comment('更動時間');
			$table->integer('done_ts')->unsigned()->nullable()->default(0)->comment('補回時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_contract_addition');
	}

}

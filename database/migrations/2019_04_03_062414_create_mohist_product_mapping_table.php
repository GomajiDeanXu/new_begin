<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMohistProductMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mohist_product_mapping', function(Blueprint $table)
		{
			$table->increments('id')->comment('系統流水號');
			$table->string('product_sernum', 50)->default('')->comment('mohist_product.product_sernum');
			$table->integer('product_id')->unsigned()->default(0)->comment('gomaji.products.product_id');
			$table->integer('create_ts')->comment('建立時間');
			$table->string('create_user', 30)->comment('建立人員');
			$table->timestamp('last_updated_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->unique(['product_sernum','product_id'], 'idx_products');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mohist_product_mapping');
	}

}

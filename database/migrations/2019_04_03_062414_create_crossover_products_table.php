<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCrossoverProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crossover_products', function(Blueprint $table)
		{
			$table->integer('cop_id', true);
			$table->string('merchant_id', 20)->default('0')->comment('crossover_merchant.merchant_id');
			$table->integer('coe_id')->default(0)->index('coe_id_idx')->comment('crossover_event.coe_id');
			$table->string('event_id', 60)->default('0')->comment('crossover_event.event_id');
			$table->string('co_product_id', 20)->default('0')->comment('商品代碼');
			$table->string('co_product_name', 50)->default('0')->comment('商品名稱');
			$table->integer('co_product_price')->unsigned()->default(0)->comment('商品價格');
			$table->string('condition_desc', 1000)->nullable()->default('')->comment('兌換條件');
			$table->integer('flag')->default(1)->comment('1:有效 0:無效');
			$table->string('memo', 200)->default('')->comment('備註');
			$table->integer('create_ts')->comment('建立時間');
			$table->string('create_user', 30)->comment('建立人員');
			$table->integer('modify_ts')->comment('異動時間');
			$table->string('modify_user', 30)->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('crossover_products');
	}

}

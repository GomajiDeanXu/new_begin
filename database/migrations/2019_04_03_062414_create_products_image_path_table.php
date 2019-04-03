<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsImagePathTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_image_path', function(Blueprint $table)
		{
			$table->integer('pip_id', true);
			$table->boolean('image_type')->index('idx_image_type')->comment('1:product, 2:store, 3:BB, 4:Boss');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID(gomaji.products.product_id)');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID(gomaji.store_info.store_id)');
			$table->integer('mbranch_id')->default(0)->index('idx_mbranch_id')->comment('分店ID(m4300.branch.mbranch_id)');
			$table->integer('boss_id')->nullable()->default(0)->index('idx_boss_id')->comment('老闆照片以店家ID為基準(gomaji.store_info.store_id)');
			$table->string('product_image', 250)->default('')->comment('主圖');
			$table->string('first_slider_image', 250)->nullable()->default('')->comment('第一張輪播圖');
			$table->string('second_slider_image', 250)->nullable()->default('')->comment('第二張輪播圖');
			$table->string('third_slider_image', 250)->nullable()->default('')->comment('第三張輪播圖');
			$table->string('fourth_slider_image', 250)->nullable()->default('')->comment('第四張輪播圖');
			$table->string('fifth_slider_image', 250)->nullable()->default('')->comment('第五張輪播圖');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->string('create_user', 30)->default('')->comment('建立人員');
			$table->integer('modify_ts')->default(0)->comment('異動時間');
			$table->string('modify_user', 30)->default('')->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_image_path');
	}

}

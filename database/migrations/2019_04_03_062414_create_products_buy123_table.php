<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsBuy123Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_buy123', function(Blueprint $table)
		{
			$table->integer('product_id')->unsigned()->primary();
			$table->integer('reviews')->nullable();
			$table->float('avg_rating', 10, 0)->nullable();
			$table->float('ddrate', 10, 0)->nullable();
			$table->integer('popularity')->nullable();
			$table->string('category_search')->nullable();
			$table->text('category_info', 65535)->nullable();
			$table->string('product_name')->nullable();
			$table->dateTime('publish_ts')->nullable();
			$table->dateTime('end_ts')->nullable();
			$table->text('fine_print', 65535)->nullable();
			$table->text('product_desc', 65535)->nullable();
			$table->float('org_price', 10, 0)->nullable();
			$table->float('price', 10, 0)->nullable();
			$table->integer('sale_num')->nullable();
			$table->dateTime('estimate_ship_ts')->nullable();
			$table->boolean('ship_type')->nullable();
			$table->string('price_before_discount')->nullable();
			$table->string('price_after_discount_tmr')->nullable();
			$table->string('price_after_discount_today')->nullable();
			$table->float('discount', 10, 0)->nullable();
			$table->string('tag_search')->nullable();
			$table->text('tag_info', 65535)->nullable();
			$table->string('cdn_path')->nullable();
			$table->string('org_path')->nullable();
			$table->string('jpg_path')->nullable();
			$table->text('shipping_notice', 65535)->nullable();
			$table->boolean('ship_method')->nullable();
			$table->string('desktop_url')->nullable();
			$table->string('mobile_url')->nullable();
			$table->string('sku', 50)->nullable();
			$table->dateTime('last_updated_datetime')->nullable();
			$table->dateTime('last_updated_datetime')
			->default('0000-00-00 00:00:00')->change();
			$table->boolean('is_adult')->nullable()->default(0)->comment('是否為18禁商品');
			$table->string('adult_img')->nullable()->default('')->comment('18禁圖片(有處理過)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_buy123');
	}

}

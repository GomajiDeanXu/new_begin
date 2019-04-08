<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBuy123EdmProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('buy123_edm_products', function(Blueprint $table)
		{
			$table->integer('edm_id')->default(0)->index('idx_edm_id')->comment('mapping buy123_edm_info.edm_id');
			$table->boolean('position_type')->default(0)->index('idx_position_type')->comment('0: 一般檔, 1:主檔, 2:副檔');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('生活市集商品代碼(API.product_id)');
			$table->string('product_name', 254)->default('')->comment('生活市集商品名稱(API.product_name)');
			$table->string('product_desc', 254)->default('')->comment('生活市集商品描述(API.product_desc)');
			$table->dateTime('publish_dt')->nullable();
			$table->dateTime('publish_dt')->default('0000-00-00 00:00:00')->index('idx_publish_dt')->comment('生活市集商品上架時間(API.publish_ts)')->change();
			$table->dateTime('end_dt')->nullable();
			$table->dateTime('end_dt')
			->default('0000-00-00 00:00:00')->index('idx_end_dt')->comment('生活市集商品下架時間(API.end_ts)')->change();
			$table->string('org_price', 50)->default('0')->comment('原價(API.org_price)');
			$table->string('price', 50)->default('0')->comment('特價(API.price)');
			$table->float('discount', 2, 1)->default(0.0)->comment('折扣(API.discount)');
			$table->float('avg_price', 2, 1)->default(0.0)->comment('件均價(API.avg_price)');
			$table->integer('sale_num')->default(0)->comment('已搶䐟數量(API.sale_num)');
			$table->string('cdn_path')->default('')->comment('生活市集商品CDN圖檔路徑(API.cdn_path)');
			$table->string('product_url')->default('')->comment('生活市集商品連結(API.desktop_url)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('buy123_edm_products');
	}

}

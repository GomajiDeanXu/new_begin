<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRivalProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rival_products', function(Blueprint $table)
		{
			$table->integer('rproduct_id', true)->comment('競業資訊商品ID');
			$table->integer('rival_id')->default(0)->comment('團購業者ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('對應到GOMAJI的店家ID');
			$table->string('store_name', 128)->default('')->comment('店家名稱');
			$table->boolean('channel')->default(1)->comment('上檔頻道');
			$table->string('product_name')->default('')->comment('商品名稱');
			$table->string('url')->default('')->comment('網址');
			$table->integer('price')->default(0)->comment('團購價');
			$table->integer('org_price')->default(0)->comment('原價');
			$table->integer('order_no')->default(0)->comment('購買數');
			$table->integer('publish_ts')->default(0)->index('idx_publish_ts')->comment('上檔日期');
			$table->integer('update_ts')->default(0)->comment('更新日期');
			$table->integer('tag_id')->default(0)->index('idx_tag_id')->comment('對應到GOMAJI的tag_id(已無使用)');
			$table->integer('category_id')->default(0)->index('idx_category_id')->comment('類別');
			$table->string('city_ids', 45)->default('')->comment('地區');
			$table->text('memo', 65535)->nullable()->comment('備註');
			$table->boolean('status')->default(0)->comment('目前狀態(0: 持續販售 / 1: 團購結束)');
			$table->boolean('rsp_flag')->default(0)->comment('(0: 單一方案 / 1: 多重方案)');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rival_products');
	}

}

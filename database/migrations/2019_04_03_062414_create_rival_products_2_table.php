<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRivalProducts2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rival_products_2', function(Blueprint $table)
		{
			$table->integer('rp_id', true);
			$table->string('pid', 40)->nullable()->index('idx_pid')->comment('競業商品PID');
			$table->integer('rival_id')->default(0)->comment('團購業者ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('對應到GOMAJI的店家ID');
			$table->string('store_name', 128)->default('')->comment('店家名稱');
			$table->boolean('channel')->default(1)->comment('上檔頻道');
			$table->string('product_name')->default('')->comment('商品名稱');
			$table->string('url')->default('')->comment('網址');
			$table->integer('price')->default(0)->comment('團購價');
			$table->integer('org_price')->default(0)->comment('原價');
			$table->boolean('base_price')->default(1)->comment('多方案金額計算依據(0: 依最低優惠價, 1: 依優惠價均值, 2: 依最高優惠價)');
			$table->integer('order_no')->default(0)->comment('購買數');
			$table->integer('radix')->default(1)->comment('份數換算');
			$table->boolean('radix_flag')->default(0)->comment('(0: 該檔以購買人數計算 / 1: 該檔以份數計算)');
			$table->integer('last_order_no')->default(0)->comment('上次購買數');
			$table->integer('total_amount')->default(0)->comment('總銷售金額');
			$table->integer('publish_ts')->default(0)->index('idx_publish_ts')->comment('上檔日期(該商品第一次抓到當天)');
			$table->integer('log_ts')->default(0)->comment('記錄的時間');
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
		Schema::drop('rival_products_2');
	}

}

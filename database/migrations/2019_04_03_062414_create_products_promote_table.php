<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsPromoteTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_promote', function(Blueprint $table)
		{
			$table->integer('product_id')->primary()->comment('產品編號');
			$table->boolean('promote_type')->default(0)->comment('促銷活動類型 [ 0:非活動商品 / 1:手機不可重複購買 / 2:到店付款 / 3:AE檔，另開URL ]');
			$table->boolean('ad_type')->default(0)->comment('行銷廣告檔次類型(promote_type = 3 適用)(0: 非廣告檔次 / 1: 前往搶購 / 2: 馬上領取 / 3: 我要參加 / 4: 成為會員 / 5: 馬上應徵)');
			$table->string('promote_text', 64)->nullable()->default('')->comment('活動文字');
			$table->string('promote_price', 64)->nullable()->default('')->comment('活動價錢，會呈現在結帳處');
			$table->string('promote_url')->nullable()->default('')->comment('活動網址');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('標示狀態 1 OK 0 fail');
			$table->integer('update_ts')->comment('資料更新的時間');
			$table->integer('status')->default(0);
			$table->integer('show_sold_out_no')->default(0);
			$table->integer('display_ts')->default(0);
			$table->integer('display_end_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_promote');
	}

}

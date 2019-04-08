<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductHighpriceFeedbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_highprice_feedback', function(Blueprint $table)
		{
			$table->integer('phf_id', true)->comment('Auto ID');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID(gomaji.products.product_id)');
			$table->integer('sp_id')->default(0)->index('idx_sp_id')->comment('商品子方案ID(gomaji.sub_products.sp_id)');
			$table->string('lower_price_url', 400)->default('')->comment('EAN買貴比對URL');
			$table->integer('lower_price_amount')->nullable()->default(0)->comment('EAN比價較低售價');
			$table->string('content')->default('')->comment('比價條件');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
			$table->string('full_name', 45)->default('')->index('idx_full_name')->comment('通報人姓名');
			$table->string('email', 45)->default('')->index('idx_email')->comment('通報人email');
			$table->string('phone', 15)->default('')->index('idx_phone')->comment('通報人電話');
			$table->dateTime('create_dt')->index('idx_create_dt')->comment('建檔時間');
			$table->dateTime('modify_dt')->nullable();
			$table->dateTime('modify_dt')
			->default('0000-00-00 00:00:00')->comment('異動時間')->change();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_highprice_feedback');
	}

}

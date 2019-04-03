<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsCopyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_copy', function(Blueprint $table)
		{
			$table->integer('product_id', true);
			$table->integer('sales_id')->default(0)->index('idx_sales_auto');
			$table->string('product_name', 254)->nullable();
			$table->string('sub_product_name', 254)->nullable();
			$table->integer('city_id')->default(0)->index('idx_city_id');
			$table->string('sub_city_ids', 45)->nullable();
			$table->integer('spot_id')->default(0);
			$table->integer('price')->default(0);
			$table->integer('org_price')->default(0);
			$table->integer('order_no')->default(0)->comment('?桀?鞈潸眺?賊?');
			$table->integer('limit_order_no')->nullable()->default(0)->comment('??頃????');
			$table->integer('max_order_no')->nullable()->default(0)->comment('??頃蝮賣?????');
			$table->integer('pre_buy_no')->nullable()->default(1)->comment('鞎瑞?閮???質眺????');
			$table->boolean('user_purchase_time')->nullable()->default(1)->comment('瘥??撣唾??質眺??活?');
			$table->integer('category_id')->nullable()->index('idx_category_id')->comment('銝餃?憿');
			$table->string('use_time_restriction', 128)->nullable();
			$table->integer('store_id')->nullable()->index('idx_store_id')->comment('摨?振id');
			$table->text('store_intro', 65535);
			$table->text('blog_intro', 65535)->nullable();
			$table->text('gomaji_intro', 65535)->nullable();
			$table->text('fine_print', 65535)->nullable()->comment('???瘜冽?鈭??');
			$table->text('highlights', 65535)->nullable()->comment('????寡?');
			$table->text('performance_bond', 65535)->nullable();
			$table->integer('publish_ts')->index('idx_publish_ts')->comment('銝?????');
			$table->integer('expiry_ts')->comment('銝?????');
			$table->integer('contract_ts')->index('idx_contract')->comment('蝪賜??');
			$table->integer('create_ts');
			$table->integer('event_start_ts')->comment('優惠開始');
			$table->integer('event_end_ts')->comment('優惠結束');
			$table->integer('rating')->default(0)->index('idx_rating')->comment('閰??');
			$table->integer('flag')->default(0)->index('idx_flag');
			$table->boolean('product_type')->default(0)->index('idx_product_type');
			$table->boolean('channel')->default(0);
			$table->boolean('list_status')->default(0);
			$table->boolean('delivery')->default(0)->index('idx_delivery');
			$table->boolean('reservation')->default(1);
			$table->integer('tag_id')->default(0);
			$table->string('bank_code', 11)->nullable()->default('');
			$table->string('bank_branch_code', 11)->nullable()->default('');
			$table->string('bank_account_name', 64)->nullable();
			$table->string('bank_account', 20)->nullable()->default('');
			$table->integer('display')->default(1)->index('idx_display');
			$table->boolean('sale_type')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_copy');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsAttributeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_attribute', function(Blueprint $table)
		{
			$table->integer('pa_id', true);
			$table->integer('present_id')->nullable()->default(0)->index('idx_present_id')->comment('提品商品流水號，gomaji.present_products.present_products');
			$table->integer('pre_schedule_id')->nullable()->default(0)->index('idx_pre_schedule_id')->comment('取號id，gomaji.product_pre_schedule.pre_schedule_id');
			$table->integer('rts_id')->nullable()->default(0)->index('idx_rts_id')->comment('CC收單id，gomaji.reporter_to_store.rts_id');
			$table->integer('product_id')->nullable()->default(0)->index('idx_product_id')->comment('商品id，gomaji.products.product_id');
			$table->integer('store_id')->nullable()->default(0)->index('idx_store_id')->comment('店家id，gomaji.store_info.store_id');
			$table->integer('group_id')->nullable()->default(0)->index('idx_group_id')->comment('分店id，gomaji.store_branch_total.branch_id');
			$table->integer('city_id')->nullable()->default(0)->index('idx_city_id')->comment('六大城市id');
			$table->integer('ch')->nullable()->default(0)->index('idx_ch')->comment('頻道id，gomaji.channel_map.channel');
			$table->boolean('attribute_type')->index('idx_attribute_type')->comment('1:每日一團');
			$table->string('title_name', 10)->default('')->comment('title描述，如:只賣今天');
			$table->string('slogan', 12)->nullable()->default('')->comment('銷售描述，如：09:00開賣!限時限量');
			$table->string('button_name', 4)->nullable()->default('')->comment('按鈕名稱');
			$table->boolean('flag')->nullable()->default(1)->index('idx_flag')->comment('1:有效 0:無效，不使用');
			$table->integer('start_date')->nullable()->default(0)->index('idx_start_date')->comment('生效起始日及時間');
			$table->integer('end_date')->nullable()->default(0)->index('idx_end_date')->comment('生效結束日及時間');
			$table->string('memo', 100)->nullable()->default('')->comment('備註');
			$table->integer('create_ts')->nullable()->default(0)->comment('建立時間');
			$table->string('create_user', 30)->comment('建立人員');
			$table->integer('modify_ts')->nullable()->default(0)->comment('異動時間');
			$table->string('modify_user', 30)->nullable()->default('')->comment('異動人員');
			$table->integer('custom_value')->nullable()->default(0)->comment('自定義的值');
			$table->string('file_path_s', 200)->nullable()->default('')->comment('圖檔的儲存路徑(小圖)');
			$table->string('file_path_b', 200)->nullable()->default('')->comment('圖檔的儲存路徑(大圖)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_attribute');
	}

}

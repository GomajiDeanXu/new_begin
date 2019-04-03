<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_info', function(Blueprint $table)
		{
			$table->integer('store_id', true)->comment('店家ID');
			$table->string('store_name', 60)->default('')->comment('店家名稱');
			$table->string('store_website')->default('')->comment('官方網站');
			$table->string('store_menu')->default('')->comment('菜單(URL)');
			$table->string('store_tel', 45)->default('')->comment('電話');
			$table->string('store_fax', 45)->default('')->comment('傳真');
			$table->string('store_postal_code', 5)->nullable()->comment('郵遞區號');
			$table->string('store_address', 60)->default('')->comment('店家地址');
			$table->string('store_email', 45)->default('')->comment('E-Mail');
			$table->text('store_intro', 65535)->comment('店家介紹');
			$table->string('store_boss', 16)->default('')->comment('負責人');
			$table->string('store_boss_pic', 8)->default('')->comment('(無使用)');
			$table->integer('store_branch')->default(0)->comment('店家數');
			$table->integer('store_level_flag')->index('idx_store_level_flag')->comment('1: 可上前台精選店家 / 2: 有優惠活動 / 4: 白金店家 / 8: 鑽石店家 / 16: 有折扣碼可取');
			$table->integer('store_order')->default(0)->index('idx_store_order')->comment('店家排序(依 store_level_flag 計算出的排序值)');
			$table->string('business_hours', 128)->nullable()->comment('營業時間');
			$table->string('invoice_id', 45)->default('')->comment('店家統編(身份證字號)');
			$table->string('invoice_address', 45)->default('')->comment('公司營登地址');
			$table->string('invoice_title', 45)->default('')->comment('發票抬頭');
			$table->string('invoice_send_address', 45)->comment('發票寄送地址');
			$table->text('store_event', 65535)->comment('優惠活動');
			$table->integer('event_start_ts')->comment('優惠活動期間(開始)');
			$table->integer('event_end_ts')->comment('優惠活動期間(結束)');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('店家資料建立時間');
			$table->integer('category_id')->unsigned()->default(0)->index('idx_category_id')->comment('分類ID，refer gomaji.product_category.category_id');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('地區');
			$table->boolean('refer_resource_id')->default(0)->index('idx_refer_resource')->comment('來源');
			$table->boolean('creator_user_id')->default(0)->index('idx_creator_user_id')->comment('店家資料建立人的backend帳號id');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('last_modify_ts')->default(0)->comment('最後修改時間');
			$table->boolean('is_3g')->default(1)->comment('是否有3G網路(已無使用)');
			$table->integer('research_id')->default(0);
			$table->text('crm_remark', 65535)->nullable();
			$table->boolean('sub_flag')->default(1)->index('idx_sub_flag');
			$table->integer('crm_id')->default(0);
			$table->float('avg_rating', 2, 1)->default(0.0)->comment('用戶評價');
			$table->integer('rating_count')->default(0)->comment('用戶評價記錄的筆數');
			$table->boolean('store_channel')->default(0)->index('idx_store_channel')->comment('bitwise
1: LB
2: ES
4: SH
8: TK');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_info');
	}

}

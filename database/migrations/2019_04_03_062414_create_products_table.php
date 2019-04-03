<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->integer('product_id', true)->comment('商品ID');
			$table->integer('sales_id')->default(0)->index('idx_sales_auto')->comment('行銷顧問');
			$table->integer('brand_id')->nullable()->default(0)->index('idx_brand_id')->comment('品牌ID，mapping gomaji.products_attribute.pa_id AND products_attribute_type = 5');
			$table->string('product_name', 254)->nullable()->comment('商品名稱(方案標)');
			$table->string('sub_product_name', 254)->nullable()->comment('商品名稱(狗血標)');
			$table->string('product_ref_name', 24)->default('')->comment('商品名稱(產品名)');
			$table->string('store_name_alias', 128)->nullable()->comment('店家別名');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('上檔城市');
			$table->string('sub_city_ids', 80)->nullable()->comment('借檔城市');
			$table->integer('spot_id')->default(0)->comment('景點(旅遊)');
			$table->integer('price')->default(0)->comment('團購特價');
			$table->integer('org_price')->default(0)->comment('原價');
			$table->smallInteger('product_num')->default(0)->comment('商品數量');
			$table->float('avg_price', 7, 1)->default(0.0)->comment('件均價');
			$table->float('avg_org_price', 7, 1)->default(0.0)->comment('件均原價');
			$table->integer('order_no')->default(0)->comment('購買數');
			$table->integer('limit_order_no')->nullable()->default(0)->comment('團購成立數');
			$table->integer('max_order_no')->nullable()->default(0)->comment('團購上限數');
			$table->integer('max_money')->default(0)->comment('團購金額上限');
			$table->integer('pre_buy_no')->nullable()->default(1)->comment('每筆交易可購上限');
			$table->boolean('user_purchase_time')->nullable()->default(1)->comment('每個user可購買次數(未使用)');
			$table->integer('category_id')->nullable()->index('idx_category_id')->comment('商品主分類');
			$table->string('sub_category_ids', 64)->nullable()->comment('商品子類別');
			$table->string('use_time_restriction', 128)->nullable()->comment('特殊使用時間限制');
			$table->integer('store_id')->nullable()->index('idx_store_id')->comment('店家ID');
			$table->text('store_intro', 65535)->comment('店家(商品)介紹');
			$table->text('blog_intro', 65535)->nullable()->comment('部落格對產品的相關介紹');
			$table->text('gomaji_intro', 65535)->nullable()->comment('GOMAJI對產品的相關介紹');
			$table->text('fine_print', 65535)->nullable()->comment('商品使用注意事項(兌換券)');
			$table->text('fine_print_labels', 65535)->nullable()->comment('兌換券標籤');
			$table->text('highlights', 65535)->nullable()->comment('必買特色');
			$table->text('performance_bond', 65535)->nullable()->comment('信託履約(發行人資訊)');
			$table->text('trust_info', 65535)->nullable()->comment('信託履約(信託銀行資訊)');
			$table->integer('publish_ts')->index('idx_publish_ts')->comment('上架時間');
			$table->integer('expiry_ts')->index('idx_expiry_ts')->comment('上架後可購買時效(小時)');
			$table->integer('contract_ts')->index('idx_contract')->comment('簽約日');
			$table->integer('create_ts')->comment('商品建立時間');
			$table->integer('event_start_ts')->index('idx_event_start_ts')->comment('優惠開始時間');
			$table->integer('event_end_ts')->index('idx_event_end_ts')->comment('優惠結束時間');
			$table->integer('rating')->default(0)->index('idx_rating')->comment('評分(未使用)');
			$table->integer('flag')->default(0)->index('idx_flag')->comment('商品狀態(bitwise)');
			$table->boolean('product_type')->default(0)->index('idx_product_type')->comment('銷售模式（參見flag_mapping）');
			$table->boolean('channel')->default(0)->index('idx_channel')->comment('頻道');
			$table->boolean('list_status')->default(0)->comment('清冊狀態');
			$table->boolean('delivery')->default(0)->index('idx_delivery')->comment('宅配商品');
			$table->boolean('delivery_charge')->default(0)->comment('0:含運 / 1:不含運');
			$table->boolean('reservation')->default(1)->comment('0: 不需預約 / 1: 需預約 / 2: 電話預約 / 3: 線上預約 / 4: 線上訂房');
			$table->integer('tag_id')->default(0)->comment('若後台異動tag， 則此欄不會更新');
			$table->string('bank_code', 11)->nullable()->default('')->comment('銀行代碼');
			$table->string('bank_branch_code', 11)->nullable()->default('')->comment('分行代碼');
			$table->string('bank_account_name', 64)->nullable()->comment('戶名');
			$table->string('bank_account', 20)->nullable()->default('')->comment('帳號');
			$table->integer('display')->default(1)->index('idx_display')->comment('商品顯示');
			$table->boolean('sale_type')->default(0)->comment('銷售方式');
			$table->boolean('invoice')->default(1)->comment('發票注意事項');
			$table->boolean('tk_type')->default(0)->comment('票券類型(1: 限時 / 2: 長銷)');
			$table->boolean('ticket')->default(0)->comment('票券注意事項');
			$table->string('refund_fee', 128)->default('')->comment('退費收取金額');
			$table->boolean('travel')->default(0)->comment('國旅卡');
			$table->boolean('cancel_rule')->default(0)->comment('取消訂房規定(0: 不收取訂金或違約金 / 1: 依「觀光局訂房定型化契約」)');
			$table->boolean('sp_flag')->default(0)->comment('0: 單一方案 / 1: 多重方案');
			$table->smallInteger('radix')->default(1)->comment('方案人數');
			$table->integer('parent_id')->default(0)->index('idx_parent_id')->comment('重新上檔的原商品ID');
			$table->integer('shipments')->nullable();
			$table->integer('shipments_days')->unsigned()->default(0)->comment('快速出貨下單後出貨天數');
			$table->boolean('inventory')->default(0)->comment('任選機制');
			$table->boolean('is_promo')->default(0)->comment('是否為促銷商品');
			$table->integer('extra')->default(0)->comment('1: 即買即用');
			$table->string('memo_wording', 25)->default('')->comment('備註欄前台顯示文字');
			$table->boolean('noshow')->default(1)->comment('信託到期未核銷款項處理方式(1: 拆回公司 / 2: 與店家按比例拆分)');
			$table->integer('shipments_type')->default(0)->comment('1: 常溫 / 2: 冷藏 / 3: 冷凍');
			$table->string('return_contact_name', 45)->nullable()->comment('退換貨聯絡人姓名');
			$table->string('return_contact_phone', 40)->nullable()->comment('退換貨聯絡人電話');
			$table->string('return_contact_address', 45)->nullable()->comment('退換貨聯絡人地址');
			$table->string('return_contact_email', 200)->nullable()->comment('退費連絡人email');
			$table->text('return_info', 65535)->nullable()->comment('宅配退換貨資訊');
			$table->boolean('freight_terms')->nullable()->default(-1)->comment('免運條件');
			$table->integer('com_id')->default(1);
			$table->boolean('refund_info')->default(0)->comment('0:default; 1:同公司資訊');
			$table->boolean('ch')->nullable()->default(0)->index('idx_ch')->comment('refer gomaji.channel_map.channel');
			$table->string('sub_channels', 24)->nullable()->default('0')->comment('借檔頻道');
			$table->integer('tk_type_id')->default(0)->comment('票券類別');
			$table->integer('order_no2')->nullable()->default(0);
			$table->integer('max_order_no2')->default(0);
			$table->float('avg_rating', 2, 1)->default(0.0);
			$table->integer('rating_count')->default(0);
			$table->integer('delivery_fee')->default(0)->comment('運費(fine_print_info.shipping_fee_1)');
			$table->integer('date_expiry')->unsigned()->default(0)->comment('即期品到期日');
			$table->integer('present_id')->unsigned()->default(0)->index('idx_present_id')->comment('present_products.present_id');
			$table->integer('pickup_bflag')->default(0)->comment('參見flag_mapping，0:不可超取,1:全家超取,2:7-11,4:萊爾富,8:B2C,16:C2C');
			$table->integer('store_pickup_max')->nullable()->default(0)->comment('超取交易可購上限數');
			$table->text('spec', 65535)->comment('規格，因可一直增加，使用 json format');
			$table->timestamp('last_updated_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->smallInteger('expose_position')->nullable()->default(0)->index('idx_expose_position')->comment('前端版位位置：0-一般檔,1-新開幕,2-首次開賣,3-限時搶購,4-週年慶(flag_mapping)');
			$table->integer('par_value')->nullable()->default(0)->comment('產品票面價(逾期每份可抵用金額)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}

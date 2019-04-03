<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBannerInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banner_info', function(Blueprint $table)
		{
			$table->integer('bi_id', true);
			$table->boolean('ad_type')->default(0)->index('idx_ad_type')->comment('banner_manage_category.ad_type');
			$table->integer('ad_position')->default(0)->index('idx_ad_position')->comment('版面位置(bitwise)');
			$table->string('subject', 128)->comment('標題');
			$table->string('img_ext', 128)->default('')->comment('圖片副檔名(小寫)');
			$table->string('ad_link')->default('')->comment('廣告連結');
			$table->string('hint', 128)->default('')->comment('提示文字');
			$table->integer('start_ts')->default(0)->comment('banner開始時間');
			$table->integer('end_ts')->default(0)->comment('banner結束時間');
			$table->boolean('pos_APP')->nullable()->default(0)->comment('App置頂位置 ');
			$table->integer('start_APP')->nullable()->default(0)->comment('App置頂開始時間');
			$table->integer('end_APP')->nullable()->default(0)->comment('App置頂結束時間');
			$table->boolean('mobile_device')->default(0)->index('idx_mobile_device')->comment('行動裝置類型 (bitwise)');
			$table->integer('ios_at_least_version')->default(0)->comment('ios版本至少要幾版以上，去掉小數點');
			$table->integer('android_at_least_version')->default(0)->comment('android版本至少要幾版以上，去掉小數點');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('confirm_ts')->default(0)->comment('審核時間');
			$table->boolean('open_type')->default(0)->comment('開啟方式(bitwise)');
			$table->integer('product_id')->default(0)->comment('products.product_id
浮水印、橫幅廣告才有(ad_type=1,4)
');
			$table->string('city_id', 128)->default('')->comment('分區, city_id 以逗號隔開
橫幅廣告才有 (0:全部城市)');
			$table->text('message', 65535)->comment('文字內容(顯示在圖片後面)');
			$table->text('top_wording', 65535)->comment('文案說明\n結帳頁 / 名單型才有');
			$table->text('wording', 65535)->comment('文案勾選內容
結帳頁 / 名單型才有');
			$table->string('agree_link')->comment('個資條款連結\n結帳頁 / 名單型才有');
			$table->text('agree_desc', 65535)->comment('個資法視窗\n結帳頁 / 名單型才有');
			$table->string('agree_img_ext', 16);
			$table->string('desc', 64)->default('')->comment('退件原因');
			$table->boolean('status')->default(0)->index('idx_status')->comment('狀態
0:已退件
1:無需審核
2:待審
3:已審核');
			$table->boolean('verify')->default(0)->comment('0: 未審
1: joan已審
2: mia已審');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態
1:可使用
0:不可使用');
			$table->integer('type')->default(0)->comment('連結位置(bitwise)');
			$table->integer('display')->default(0)->comment('判別出現的DEVICE欄位');
			$table->string('link_event')->default('');
			$table->string('img_event_ext', 128)->default('');
			$table->string('ref', 20)->default('');
			$table->string('action', 200)->nullable()->comment('4300推播動作');
			$table->boolean('action_type')->default(0)->comment('4300連結設定');
			$table->boolean('app_id')->default(0)->comment('顯示 (1: GOMAJICARD, 2: GOMAJI)');
			$table->string('color_code', 8)->default('')->comment('色碼');
			$table->integer('group_id')->nullable()->default(0);
			$table->integer('ios_at_most_version')->nullable()->default(0)->comment('ios版本要幾版以下，去掉小數點');
			$table->integer('android_at_most_version')->nullable()->default(0)->comment('android版本要幾版以下，去掉小數點');
			$table->integer('hotel_id')->default(0)->comment('OTA店家id');
			$table->integer('mbranch_id')->nullable()->default(0)->comment('買單ID(m4300.branch.mbranch_id)');
			$table->integer('display_platform')->default(0)->comment('請參考flag_mapping');
			$table->integer('display_pc_ref')->default(0)->comment('pc 顯示對象 bitwise (1 = GOMAJI, 2 = 美安,4=其他返利網)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banner_info');
	}

}

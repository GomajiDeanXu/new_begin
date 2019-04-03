<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinePrintInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fine_print_info', function(Blueprint $table)
		{
			$table->increments('fine_print_info_id');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->boolean('coupon_type')->default(0)->comment('上檔類型(1: 餐廳(方案) / 2: 餐廳(等值金額抵用券) / 3: 課程 / 4: 美容美髮其他 / 5: 旅遊 / 6: 旅遊(行程) / 7: 宅配 / 8: 宅配(實體票券) / 9: 宅配(旅遊票券) / 10: 廣告)');
			$table->text('fine_print', 65535)->nullable()->comment('兌換券內容');
			$table->boolean('use_day_type')->default(0)->comment('可使用日(1: 限平日使用 / 2: 平假日皆可使用 / 3: 指定可使用日 / 4: 其他 / 5:依方案設定)');
			$table->boolean('use_day_start')->comment('指定可使用日(開始)(weekday)');
			$table->boolean('use_day_end')->comment('指定可使用日(結束)(weekday)');
			$table->string('use_day_other', 120)->nullable()->comment('其他可使用日');
			$table->boolean('use_period_type')->default(0)->comment('可使用時段(1: 店家營業時間皆可 / 2: 有限定特別時段)');
			$table->string('closed_days', 13)->nullable()->comment('公休日');
			$table->string('closed_days_other', 254)->nullable()->comment('公休日(其他)');
			$table->integer('usage_hours')->default(0)->comment('使用時間長度(分鐘，0: 不限)');
			$table->string('prohibits', 24)->default('')->comment('不可使用規範(逗號分隔)(1: 政府機關規定之國定假日 / 2: 連續假日(當日) / 3: 連續假日(當日並含前夕) / 4: 跨店使用 / 5: 攜帶寵物 / 6: 飲食 / 7: 攝影、拍照)');
			$table->string('other_prohibits', 200)->nullable()->comment('其他禁止事項');
			$table->text('unusable_dates', 65535)->nullable()->comment('不可使用節日');
			$table->boolean('booking_type')->default(0)->comment('預約方式(1: 不需提前預約 / 2: 電話預約 / 3: 線上預約 / 4: 線上訂房)');
			$table->boolean('booking_lead_type')->default(0)->comment('提前預約類型 default:0, 1:天，2:小時');
			$table->boolean('booking_lead_days')->default(0)->comment('需提幾天前預約(需於入住前幾天訂房)');
			$table->boolean('booking_lead_hours')->default(0)->comment('需提前幾小時預約');
			$table->string('booking_description', 200)->nullable()->comment('預約其他說明');
			$table->smallInteger('course_size_limit')->default(0)->comment('每班開班人數');
			$table->smallInteger('course_size_max')->default(0)->comment('每班最多人數');
			$table->smallInteger('course_duration')->default(0)->comment('課程時間(小時)');
			$table->boolean('non_particular')->default(0)->comment('指定美容師/設計師(0: 可指定 / 1: 不可指定)');
			$table->boolean('gender_restriction')->default(0)->comment('性別(0: 不限 / 1: 限男性 / 2: 限女性)');
			$table->string('hair_length_restriction', 120)->nullable()->comment('髮長限制');
			$table->boolean('member_restriction')->default(0)->comment('會員(0: 不限 / 1: 限新會員)');
			$table->boolean('use_range')->default(0)->comment('內用外帶(0: 不限 / 1: 限內用 / 2: 限外帶)');
			$table->integer('use_range_provision')->default(0)->comment('(1: 外帶時每人每次可提領多份 / 2: 內用時可同時多人使用多張)');
			$table->smallInteger('cover_charge')->default(0)->comment('低消金額(0: 免低消)');
			$table->boolean('free_cover_charge_height')->default(0)->comment('幾公分以下免低消');
			$table->boolean('free_cover_charge_age')->default(0)->comment('幾歲以下免低消');
			$table->boolean('adult_height')->default(0)->comment('幾公分以上算大人');
			$table->boolean('adult_age')->default(0)->comment('幾歲以上算大人');
			$table->boolean('children_height_min')->default(0)->comment('兒童身高範圍(最小)');
			$table->boolean('children_height_max')->default(0)->comment('兒童身高範圍(最大)');
			$table->boolean('children_age_min')->default(0)->comment('兒童年紀範圍(最小)');
			$table->boolean('children_age_max')->default(0)->comment('兒童年紀範圍(最大)');
			$table->smallInteger('children_cover_charge')->default(0)->comment('兒童低消金額');
			$table->boolean('service_charge')->default(0)->comment('店內服務費(%)');
			$table->string('booking_phone', 40)->nullable()->comment('訂房電話');
			$table->boolean('available_booking_days')->default(0)->comment('開放預約時間');
			$table->boolean('cancel_lead_days')->default(0)->comment('取消需於入住前取消預約或擇期');
			$table->boolean('cancel_rule')->default(0)->comment('退房規定(1: 依「觀光局訂房定型化契約」 / 2: 依「店家」規定辦理 / 3: 不收取訂金或違約金)');
			$table->string('booking_provision_url')->nullable()->comment('訂房規定連結');
			$table->string('other_cancel_rule')->nullable()->comment('其他退房規定');
			$table->string('checkin_time', 5)->nullable()->comment('入住時間');
			$table->string('checkout_time', 5)->nullable()->comment('退房時間');
			$table->boolean('max_days_in_a_row')->default(0)->comment('連續住房最多天數');
			$table->smallInteger('min_group_limit')->default(0)->comment('最低出團人數');
			$table->string('other_booking_provision')->nullable()->comment('其他訂房規則');
			$table->boolean('weekday_start')->default(0)->comment('平日定義(開始)(weekday)');
			$table->boolean('weekday_end')->default(0)->comment('平日定義(結束)(weekday)');
			$table->boolean('holiday_start')->default(0)->comment('假日定義(開始)(weekday)');
			$table->boolean('holiday_end')->default(0)->comment('假日定義(結束)(weekday)');
			$table->string('store_info_url')->nullable()->comment('店家資訊連結');
			$table->text('surcharge', 65535)->nullable()->comment('加價使用限制');
			$table->integer('surcharge_amount')->default(0)->comment('加價金額');
			$table->integer('visa_fee')->default(0)->comment('出國手續費及簽證費及其他規費');
			$table->integer('processing_fee')->default(0)->comment('代辦證件之規費');
			$table->integer('transportation_fee')->default(0)->comment('交通運輸費');
			$table->integer('meals_cost')->default(0)->comment('餐飲費');
			$table->integer('accommodation_fee')->default(0)->comment('住宿費');
			$table->integer('guide_fee')->default(0)->comment('旅覽費用');
			$table->integer('pickup_fee')->default(0)->comment('接送費');
			$table->integer('baggage_charge')->default(0)->comment('行李費');
			$table->integer('tax')->default(0)->comment('稅捐');
			$table->integer('service_fee')->default(0)->comment('服務費');
			$table->text('provision_note', 65535)->nullable()->comment('兌換條件補充');
			$table->string('shipping_service', 40)->default('')->comment('配送方式(逗號分隔)(1: 常溫配送 / 2: 冷藏配送 / 3: 冷凍配送 / 4: 掛號 / 5: 平信 / 6: 便利袋)');
			$table->string('logistics', 40)->default('')->comment('物流公司(逗號分隔)(1: 統一速達 / 2: 台灣宅配通 / 3: 大榮貨運 / 4: 新竹貨運 / 5: 郵局)');
			$table->string('other_logistics', 50)->nullable()->comment('其他物流公司');
			$table->boolean('shipping_fee_type')->default(0)->comment('運費計算(1: 免運費 / 2: 含運費 / 3: 貨到付運費)');
			$table->integer('shipping_fee_1_range_start')->default(0)->comment('運費1份數區間(下限)');
			$table->integer('shipping_fee_1_range_end')->default(0)->comment('運費1份數區間(上限)');
			$table->integer('shipping_fee_1')->default(0)->comment('運費1');
			$table->integer('free_shipping_limit_1')->default(0)->comment('免運份數1');
			$table->integer('shipping_fee_2_unit')->default(0)->comment('運費2份數');
			$table->integer('shipping_fee_2')->default(0)->comment('運費2');
			$table->integer('free_shipping_limit_2')->default(0)->comment('免運份數2');
			$table->string('shipping_fee_description', 200)->nullable()->comment('運費其他說明');
			$table->string('return_contact_name', 45)->nullable()->comment('退換貨店家聯絡人姓名');
			$table->string('return_contact_phone', 40)->nullable()->comment('退換貨店家電話');
			$table->string('return_contact_email', 200)->nullable()->comment('退換貨店家E-mail');
			$table->string('return_contact_address', 45)->nullable()->comment('退換貨店家地址');
			$table->string('return_contact_info', 200)->nullable()->comment('退換貨連絡資訊');
			$table->text('shipping_note', 65535)->nullable()->comment('出貨條件補充');
			$table->string('ae_website_link')->nullable()->comment('官網連結');
			$table->string('tk_position', 200)->nullable()->comment('展覽地點');
			$table->string('tk_address', 200)->nullable()->comment('展覽地址');
			$table->string('business_hours', 240)->nullable()->comment('展覽時段');
			$table->string('closed_hours', 240)->nullable()->comment('休館時段');
			$table->string('tk_provision', 240)->nullable()->comment('其他進場規定');
			$table->boolean('free_children_height')->default(0)->comment('幾公分以下兒童免票');
			$table->boolean('free_handicapped')->default(0)->comment('身障人士免票');
			$table->boolean('free_age')->default(0)->comment('幾歲以上長者免票');
			$table->smallInteger('student_price')->default(0)->comment('學生票價');
			$table->smallInteger('discount_price')->default(0)->comment('優惠票價');
			$table->boolean('discount_age')->default(0)->comment('幾歲以上長者享敬老票');
			$table->boolean('discount_handicapped')->default(0)->comment('身障人士享優惠票');
			$table->string('tk_other_discount', 240)->nullable()->comment('其他票種');
			$table->string('refer_booking_url')->nullable()->default('')->comment('預約參考連結');
			$table->string('special_holiday_spec', 100)->nullable()->default('')->comment('特殊假日定義');
			$table->string('not_allow', 13)->nullable()->comment('不適用(1:酒水, 2:商業午餐, 3:特價商品, 4:包廂)');
			$table->integer('use_range_provision_ticket_limit')->nullable()->comment('內用/外帶每人每次可用張數');
			$table->integer('ep_spend_price')->nullable()->comment('兌換卷範例的消費金額');
			$table->integer('ep_discount_price')->nullable()->comment('兌換卷範例的折扣金額');
			$table->integer('ep_real_spend_price')->nullable()->comment('兌換卷範例的真實消費金額');
			$table->integer('event_start_date_type')->nullable()->comment('開始兌換日');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fine_print_info');
	}

}

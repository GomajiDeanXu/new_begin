<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReporterToStoreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reporter_to_store', function(Blueprint $table)
		{
			$table->integer('rts_id', true);
			$table->integer('store_contact_id')->default(0)->index('idx_store_contact_id');
			$table->integer('sales_id')->index('idx_sales_id')->comment('行銷顧問ID');
			$table->integer('product_id')->index('idx_product_id')->comment('商品ID');
			$table->integer('pre_schedule_id')->default(0)->index('idx_pre_schedule_id')->comment('product_pre_schedule.pre_schedule_id');
			$table->integer('brand_id')->nullable()->default(0)->comment('品牌ID，mapping gomaji.products_attribute.pa_id AND products_attribute_type = 5');
			$table->integer('qc_preview_id')->default(0)->comment('qc_preview.qc_preview_id');
			$table->boolean('bu')->default(0)->comment('上檔BU');
			$table->integer('create_ts')->default(0)->comment('status 0');
			$table->integer('done_submit_ts')->default(0);
			$table->integer('done_contract_upload_ts')->default(0)->comment('status 3');
			$table->integer('done_contract_pass_ts')->default(0)->index('idx_contrat_pass')->comment('status 1');
			$table->integer('done_qc_pass_ts')->default(0);
			$table->integer('done_cc_pass_ts')->default(0);
			$table->integer('done_mc_resource_upload_ts')->default(0)->comment('status 4');
			$table->integer('done_mc_resource_pass_ts')->default(0)->comment('status 2');
			$table->integer('done_schedule_meeting_ts')->default(0)->comment('status 5');
			$table->integer('done_meeting_ts')->default(0)->comment('status 6');
			$table->integer('done_gr_resource_upload_ts')->default(0)->comment('status 7');
			$table->integer('done_preview_page_ts')->default(0)->comment('status 8');
			$table->integer('done_page_pass_ts')->default(0)->index('idx_page_pass')->comment('status 9');
			$table->integer('done_sp_schedule_ts')->default(0);
			$table->integer('meeting_ts')->comment('特派約訪時間');
			$table->integer('done_checklist_upload_ts')->default(0)->comment('status 10');
			$table->integer('close_ts')->comment('status 11');
			$table->integer('pre_publish_ts')->index('pre_publish_ts')->comment('上檔時間');
			$table->integer('pre_expiry_ts')->comment('預計上檔天數(小時)');
			$table->integer('done_qc_pass_user_id')->default(0)->comment('backend user_id');
			$table->integer('price')->default(0)->comment('特價');
			$table->integer('org_price')->default(0)->comment('原價');
			$table->integer('pre_buy_no')->default(0)->comment('每筆交易可購上限');
			$table->integer('max_order_no')->default(0)->comment('可銷售份數');
			$table->integer('radix')->default(1)->comment('方案人數');
			$table->integer('city_id')->default(0)->comment('上檔城市');
			$table->integer('category_id')->default(0)->comment('商品類別');
			$table->string('sub_category_ids', 64)->nullable()->comment('商品子類別');
			$table->text('pre_product_name', 65535)->comment('方案名稱');
			$table->string('product_ref_name', 128)->default('')->comment('商品名(供後勤快速辦識使用)');
			$table->string('store_name_alias', 128)->nullable()->comment('店家別名');
			$table->text('conditions', 65535)->comment('兌換條件(3.0之前用)');
			$table->text('notes_for_reporter', 65535)->comment('特派注意事項');
			$table->text('gw_command', 65535)->comment('文字注意事項');
			$table->text('gpa_command', 65535)->nullable()->comment('GPA注意事項');
			$table->text('command')->comment('CRM注意事項(已無使用)');
			$table->text('mc_resource_upload_pass_command', 65535)->comment('QC退件原因備註');
			$table->text('qc_page_pass_command', 65535)->comment('QC頁面改善備註');
			$table->text('sp_command', 65535)->comment('SP注意事項');
			$table->text('qc_command', 65535)->comment('QC注意事項');
			$table->text('gc_command', 65535)->comment('GC注意事項');
			$table->text('schedule_command', 65535)->comment('SP標籤');
			$table->text('gc_memo', 65535)->comment('GC標籤(備註欄)');
			$table->text('gp_memo', 65535)->comment('GP標籤(備註欄)');
			$table->text('crm_memo', 65535)->comment('CRM人員標籤(備註欄)');
			$table->text('cc_contract_pass_command', 65535)->comment('CC退件原因備註');
			$table->text('gw_delay_reason', 65535)->nullable()->comment('GW延遲出頁面原因');
			$table->string('gp_name', 32)->comment('約訪特派記者');
			$table->string('cc_name', 32)->default('')->comment('負責的CC');
			$table->string('gw_name', 32)->default('')->comment('被分派的文字記者');
			$table->integer('gw_pass_ts')->default(0)->comment('gw過件時間');
			$table->string('create_page_name', 32)->default('')->comment('商品頁生成人員');
			$table->string('creator', 32)->default('')->comment('建檔人員');
			$table->boolean('report_status')->default(0)->index('idx_report_status')->comment('排程進度');
			$table->boolean('sale_type')->default(0)->comment('銷售方式');
			$table->integer('contract_estimate_revenue')->default(0)->comment('方案預估營收');
			$table->integer('page_estimate_revenue')->default(0)->comment('頁面預估營收');
			$table->integer('estimate_revenue_id')->default(0);
			$table->integer('flag')->default(0);
			$table->integer('sp_flag')->default(0)->comment('(0: 單一方案 / 1: 多重方案)');
			$table->integer('gp_flag')->default(0)->comment('1: 特派排入時程 / 2: 特派完成訪談拍照 / 16: 急件');
			$table->integer('gw_flag')->default(0)->comment('1: 急件');
			$table->boolean('photo')->default(0)->comment('1: 要拍照 / 2: 不用拍照，店家供圖 / 3: 不用拍照，用上一檔照片 / 4: 要拍照，店家另有供圖 / 5: 不用拍，使用情境圖庫 / 6: 要拍照，需至店家拍照');
			$table->integer('last_pid')->default(0)->comment('使用上一檔照片的pid');
			$table->boolean('require_cd')->nullable()->default(0)->comment('需要申請光碟 0 N 1 Y');
			$table->string('require_cd_contract_name', 45)->nullable()->comment('光碟寄送聯絡人');
			$table->string('require_cd_contract_address', 45)->nullable()->comment('光碟寄送地址');
			$table->boolean('require_cd_status')->default(0)->comment('光碟寄送狀態 0 N 1 Y');
			$table->integer('parent_id')->default(0)->comment('分次銷售的商品ID');
			$table->boolean('reject_count')->default(0)->comment('退件次數');
			$table->integer('event_start_date')->default(0)->comment('開始兌換日');
			$table->boolean('event_start_date_type')->default(0)->comment('開始兌換日類型(1: 銷售日當天開始兌換 / 2: 自銷售日數後+7日起兌換 / 3: 自銷售日後第N日起兌換 / 4: 開始兌換日timestamp)');
			$table->integer('duration')->default(0)->comment('兌換券使用期間');
			$table->boolean('duration_type')->default(0)->comment('兌換券使用期間單位(1: 天 / 2: 月 / 3: 截止日期[timestamp] / 4: 快速出貨 / 5: 分次銷售 / 6: 下架後幾天(限宅配) / 7: 下架後幾天(實體票券出貨) / 8: 下架後幾工作天(一般出貨))');
			$table->string('memo_wording', 25)->nullable()->comment('備註欄前台顯示文字');
			$table->boolean('travel')->default(0)->comment('國旅卡選項(0: 適用國旅卡 / 1: 不適用國旅卡)');
			$table->integer('ttag_id')->default(0)->comment('旅遊類型');
			$table->integer('spot_id')->default(0)->comment('景點(spot.spot_id)');
			$table->boolean('ticket')->default(0)->comment('票券注意事項(1: 銷售完成 7 日內可退 / 3: 銷售期間可退費(下架不可退) / 4: 至優惠活動結束前未使用可退 / 5: 逾優惠兌換結束日未使用「可」退費)');
			$table->integer('contract_ts')->default(0)->comment('簽約日期');
			$table->text('republish_note', 65535)->nullable()->comment('分次異動注意事項');
			$table->integer('republish_change')->default(0)->comment('分次異動項目 1:份數 / 2:分店增減 / 4:方案內容 / 8:兌換條件 / 16:出貨條件 / 32:其他');
			$table->text('republish_change_note', 65535)->comment('分次異動項目 其他事項');
			$table->boolean('noshow')->default(1)->comment('信託到期未核銷款項處理方式(1: 拆回公司 / 2: 與店家按比例拆分)');
			$table->boolean('shipments_type')->default(0)->comment('指定物流配送方式(1: 常溫 / 2: 冷凍 / 3: 冷藏)');
			$table->integer('new_product')->default(0);
			$table->string('gpp_name', 32)->default('')->comment('GPP人員');
			$table->text('menu_desc', 65535)->nullable()->comment('預告菜單內容');
			$table->boolean('tk_type')->default(0)->comment('上檔類型(1: 限時 / 2: 長銷)');
			$table->boolean('refund_info')->default(0)->comment('0:default; 1:同公司資訊');
			$table->string('refund_fee', 128)->default('')->comment('退費收取金額');
			$table->string('gpa_name', 32)->default('')->comment('GPA人員');
			$table->integer('gpa_upload_ts')->default(0)->comment('gpa上傳時間');
			$table->integer('gpa_flag')->default(0)->comment('1: 急件');
			$table->integer('gpa_pass_ts')->default(0)->comment('gpa過件時間');
			$table->text('gpa_memo', 65535)->comment('gpa備註');
			$table->text('gpa_delay_reason', 65535)->comment('gpa延遲原因備註');
			$table->integer('tk_type_id')->default(0)->comment('預產票券類別');
			$table->boolean('product_type')->default(1);
			$table->float('fs_ratio', 11, 4)->default(0.0000)->comment('廣告交換評價五星贊助');
			$table->integer('pcode_money')->default(0)->comment('麻吉券金額');
			$table->integer('pcode_expiry_days')->default(0)->comment('麻吉券使用天數');
			$table->integer('date_expiry')->unsigned()->default(0)->comment('即期品到期日');
			$table->integer('present_id')->unsigned()->default(0)->comment('present_products.present_id');
			$table->integer('prod_attr')->default(0)->comment('商品特殊屬性 bitwise 1:多地區通用');
			$table->integer('pickup_bflag')->default(0)->comment('參見flag_mapping，0:不可超取,1:全家超取,2:7-11,4:萊爾富,8:B2C,16:C2C');
			$table->integer('store_pickup_max')->nullable()->default(0)->comment('超取交易可購上限數');
			$table->smallInteger('expose_position')->nullable()->default(0)->comment('前端版位位置：0-一般檔,1-新開幕,2-首次開賣,3-限時搶購,4-週年慶(flag_mapping)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reporter_to_store');
	}

}

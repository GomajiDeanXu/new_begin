<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductPreScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_pre_schedule', function(Blueprint $table)
		{
			$table->increments('pre_schedule_id')->comment('取號號碼');
			$table->integer('city_id')->default(0)->index('idx_city_id')->comment('取號地區');
			$table->integer('ch')->comment('channel_name');
			$table->integer('sales_id')->default(0)->comment('行銷顧問');
			$table->integer('store_contact_id')->default(0)->comment('store_contact_id');
			$table->integer('qc_preview_id')->default(0)->comment('qc_preview.qc_preview_id');
			$table->integer('category_id')->default(0)->comment('商品類別(宅配)');
			$table->boolean('tk_type')->default(0)->comment('票券類型(1: 限時 / 2: 長銷)');
			$table->integer('schedule_ts')->default(0)->index('idx_schedule_ts')->comment('取號日期');
			$table->integer('create_ts')->default(0)->comment('取號時間');
			$table->integer('reject_ts')->default(0)->comment('退件時間');
			$table->integer('accept_ts')->default(0)->comment('收單時間');
			$table->integer('status')->default(0)->comment('處理進度(0: 待處理 / 1: 已收單 / 2: 資料不齊退件)');
			$table->text('reject_reason', 65535)->nullable()->comment('退件原因');
			$table->text('pre_product_name', 65535)->nullable()->comment('方案主標');
			$table->string('product_ref_name', 128)->nullable()->comment('商品名(供後勤快速辦識使用)');
			$table->string('store_name_alias', 128)->nullable()->comment('店家別名');
			$table->text('gc_command', 65535)->nullable()->comment('GC注意事項');
			$table->text('qc_command', 65535)->nullable()->comment('QC注意事項');
			$table->text('sp_command', 65535)->nullable()->comment('SP注意事項');
			$table->text('gw_command', 65535)->nullable()->comment('文字注意事項');
			$table->text('gpa_command', 65535)->nullable()->comment('GPA注意事項');
			$table->text('notes_for_reporter', 65535)->nullable()->comment('特派注意事項');
			$table->text('republish_note', 65535)->nullable()->comment('分次異動注意事項');
			$table->boolean('photo')->default(0)->comment('1: 要拍照 / 2: 不用拍照，店家供圖 / 3: 不用拍照，用上一檔照片 / 4: 店家供圖，但不足還是要拍');
			$table->integer('last_pid')->default(0)->comment('上一檔照片pid');
			$table->integer('parent_id')->default(0)->comment('分次銷售pid');
			$table->boolean('republish')->default(0)->comment('0: 非分次 / 1: 分次銷售 / 2: 分次異動');
			$table->integer('contract_ts')->default(0)->comment('簽約日期');
			$table->integer('flag')->default(0)->comment('同 reporter_to_store.flag');
			$table->integer('pre_expiry_ts')->default(0)->comment('上架天數(長銷)');
			$table->boolean('product_type')->default(1);
			$table->float('fs_ratio', 11, 4)->default(0.0000)->comment('廣告交換評價五星贊助');
			$table->integer('creator_user_id')->default(0)->comment('取號或退件操作人的backend帳號id');
			$table->integer('pcode_money')->default(0)->comment('麻吉券金額');
			$table->integer('pcode_expiry_days')->default(0)->comment('麻吉券使用天數');
			$table->boolean('check_no_upload')->default(0)->comment('0:必須上傳分異單 1:無須上傳分異單');
			$table->string('memo')->default('')->comment('備註');
			$table->integer('present_id')->unsigned()->default(0)->comment('present_products.present_id');
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
		Schema::drop('product_pre_schedule');
	}

}

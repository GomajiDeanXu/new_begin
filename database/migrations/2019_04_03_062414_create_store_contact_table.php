<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_contact', function(Blueprint $table)
		{
			$table->integer('store_contact_id', true);
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->boolean('channel')->default(0)->index('idx_channel')->comment('頻道');
			$table->integer('ch')->comment('新版channel');
			$table->integer('sales_id')->default(0)->index('idx_sales_id')->comment('行銷顧問');
			$table->integer('origin_sales_id')->nullable()->default(0)->comment('最一開始簽約的顧問id');
			$table->boolean('store_rank')->default(0)->comment('店家等級評估');
			$table->string('contact_name', 45)->nullable()->comment('連絡人姓名');
			$table->boolean('contact_gender')->default(0)->comment('連絡人性別');
			$table->string('contact_title', 16)->nullable()->comment('連絡人職稱');
			$table->string('contact_phone', 45)->nullable()->comment('連絡人電話');
			$table->string('contact_email', 200)->nullable()->comment('連絡人E-Mail');
			$table->string('booking_email', 200)->nullable()->comment('訂房組 E-Mail');
			$table->string('finance_contact_name', 45)->nullable()->comment('財會連絡人姓名');
			$table->boolean('finance_contact_gender')->default(0)->comment('財會連絡人性別');
			$table->string('finance_contact_phone', 45)->nullable()->comment('財會連絡人電話');
			$table->string('finance_contact_email', 200)->nullable()->comment('財會連絡人 E-Mail');
			$table->boolean('contact_status_id')->default(0)->index('idx_contact_status_id')->comment('開發狀態');
			$table->integer('contact_status_modify_ts')->default(0)->comment('開發狀態最後一次變動的時間');
			$table->text('remark', 65535)->nullable()->comment('開發狀況記錄');
			$table->integer('last_contact_ts')->default(0)->index('idx_last_contact_ts')->comment('最後更新時間');
			$table->boolean('sales_picked')->default(0)->comment('(0: 主管指派 / 1: 顧問選取)');
			$table->boolean('assigner')->default(0)->comment('(1: 顧問選取 / 2: 主管指派 / 3: Leads指派 / 4: 一個月未更新 / 5: 六個月無新商品 / 6: 未簽約 / 7: 兩週未更新 / 8: 顧問離職移轉 / 9: 未上傳主約)');
			$table->boolean('contract_limit')->default(1)->comment('可上傳合約數限制');
			$table->string('bank_code', 11)->default('')->comment('銀行代碼');
			$table->string('bank_branch_code', 11)->default('')->comment('分行代碼');
			$table->string('bank_account_name', 64)->default('')->comment('戶名');
			$table->string('bank_account', 20)->default('')->comment('帳號');
			$table->boolean('bank_flag')->default(0)->index('idx_bank_flag')->comment('0:未審核;
1:已審核;');
			$table->boolean('first')->default(0)->index('idx_first')->comment('0:會計從未審核過
1:會計已審核過');
			$table->integer('confirm_time')->default(0)->comment('審核時間');
			$table->string('confirm_user', 45)->default('')->comment('審核人員');
			$table->string('com_no', 10)->default('')->comment('匯款統編');
			$table->boolean('flag')->default(0)->comment('素材已完成上傳(0: 未上傳 / 1: 已上傳)');
			$table->boolean('is_switch')->nullable()->default(0)->comment('店家有無轉換過各大超商的標記bitwise');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_contact');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreGroupInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_group_info', function(Blueprint $table)
		{
			$table->integer('store_group_id', true);
			$table->integer('group_id')->index('idx_group_id');
			$table->boolean('channel')->default(0)->comment('頻道');
			$table->string('bank_code', 11)->default('')->comment('銀行代號');
			$table->string('bank_branch_code', 11)->default('')->comment('分行代號');
			$table->string('bank_account_name', 64)->default('')->comment('銀行帳號名稱');
			$table->string('bank_account', 20)->default('')->comment('銀行帳號');
			$table->boolean('account_type')->default(0)->index('idx_account_type')->comment('1: 公司
2: 個人');
			$table->string('identity_no', 45)->default('')->comment('account_type 為 1 時為統編
account_type 為 2 時為身份證字號');
			$table->string('confirm_user', 45)->default('')->comment('審核人員');
			$table->integer('confirm_ts')->default(0)->comment('審核時間');
			$table->boolean('bank_flag')->default(0)->index('idx_bank_flag')->comment('0: 銀行帳號待審核
1: 銀行帳號已審核
');
			$table->boolean('invoice_type')->default(0)->index('idx_invoice_type')->comment('1: 發票
2: 收據
3: 個人一時貿易所得');
			$table->string('invoice_com_no', 10)->default('')->comment('發票公司統編');
			$table->string('invoice_title', 45)->default('')->comment('發票公司抬頭');
			$table->string('invoice_address', 60)->default('')->comment('發票公司地址');
			$table->boolean('check_status')->default(0)->comment('經查詢店家開業中且業務範圍為餐廳
0: 否
1: 是');
			$table->string('responsible_person_name', 45)->default('')->comment('invoice_type 為 3 時
負責人姓名');
			$table->string('responsible_person_id', 45)->default('')->comment('invoice_type 為 3 時\n負責人身份證字號\n');
			$table->string('responsible_person_upload_photo', 45)->default('')->comment('invoice_type 為 3 時
需上傳負責人身分證正反面影本
0: 未上傳
1: 已上傳
');
			$table->string('finance_contact_name', 45);
			$table->string('finance_contact_address', 45);
			$table->string('finance_contact_phone', 100);
			$table->string('finance_contact_email', 200);
			$table->boolean('finance_contact_gender');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('modify_ts')->default(0)->comment('銀行帳戶上次修改時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0: 刪除
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_group_info');
	}

}

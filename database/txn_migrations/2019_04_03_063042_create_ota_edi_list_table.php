<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaEdiListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ota_edi_list', function(Blueprint $table)
		{
			$table->integer('edi_id', true)->comment('EDIID');
			$table->integer('store_id')->index('idx_store_id')->comment('店家ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店ID (對應 gomaji.store_branch_total.branch_id');
			$table->string('bank_account', 20)->index('idx_bank_account')->comment('銀行帳號');
			$table->string('bank_code', 11)->index('idx_bank_code')->comment('銀行代號');
			$table->string('bank_account_name', 64)->index('idx_bank_account_name')->comment('戶名');
			$table->integer('money')->default(0)->comment('金額');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('新增時間');
			$table->integer('allocate_ts')->default(0)->index('idx_allocate_ts')->comment('完成撥款日');
			$table->integer('finish_ts')->default(0)->index('idx_finish_ts')->comment('完成撥款時間');
			$table->integer('success')->default(0)->index('idx_success')->comment('撥款成功(0:未撥款1:撥款成功)');
			$table->string('status', 5)->default('')->index('idx_status')->comment('撥款狀態(同 transaction.edi_list.status)');
			$table->string('user_id', 32)->comment('使用者帳號');
			$table->integer('type')->default(0)->index('idx_type')->comment('資料類型(1:一起行銷2:一起旅行)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ota_edi_list');
	}

}

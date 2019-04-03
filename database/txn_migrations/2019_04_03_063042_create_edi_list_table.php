<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEdiListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('edi_list', function(Blueprint $table)
		{
			$table->integer('edi_id', true)->comment('EDI ID');
			$table->integer('store_id')->index('idx_city_id')->comment('店家編號');
			$table->integer('branch_id')->index('branch_id')->comment('分店編號');
			$table->string('bank_account', 20)->index('bank_account')->comment('銀行帳號');
			$table->string('bank_code', 11)->index('bank_code')->comment('銀行代號');
			$table->string('bank_account_name', 64)->index('bank_account_name')->comment('戶名');
			$table->integer('money')->default(0)->comment('金額');
			$table->integer('create_ts')->default(0)->index('create_ts')->comment('新增時間');
			$table->integer('allocate_ts')->default(0)->index('allocate_ts')->comment('完成撥款日');
			$table->integer('finish_ts')->default(0)->index('finish_ts')->comment('完成撥款時間');
			$table->integer('success')->default(0)->index('success')->comment('撥款成功(0:未撥款1:撥款成功)');
			$table->string('status', 5)->default('')->index('status')->comment('撥款狀態(01:編輯02:送審03:審核中04:待放行05:退件06:已放行07:扣款成功08:交易失敗09:預約取消進行中10:預約取消成功11:預約取消失敗)');
			$table->string('user_id', 32)->comment('使用者帳號');
			$table->integer('type')->default(0)->index('type')->comment('資料類型(1:一起行銷2:一起旅行)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('edi_list');
	}

}

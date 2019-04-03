<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdEdiListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ad_edi_list', function(Blueprint $table)
		{
			$table->integer('edi_id', true);
			$table->integer('store_id')->comment('店家編號');
			$table->integer('branch_id')->index('idx_branch_id')->comment('分店ID');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->string('bank_code', 11)->comment('銀行代號');
			$table->string('bank_branch_code', 11)->comment('分行代號');
			$table->string('bank_account_name', 64)->comment('戶名');
			$table->string('bank_account', 20)->comment('銀行帳號');
			$table->integer('money')->default(0)->comment('金額');
			$table->integer('create_ts')->default(0)->comment('新增時間');
			$table->integer('allocate_ts')->default(0)->comment('預計撥款日');
			$table->integer('allocate_finish_ts')->default(0)->comment('完成撥款時間');
			$table->integer('success')->default(0)->comment('EDI結果\n[0]:預設\n[1]:成功');
			$table->string('status', 5)->default('')->comment('撥款狀態(01:編輯02:送審03:審核中04:待放行05:退件06:已放行07:扣款成功08:交易失敗09:預約取消進行中10:預約取消成功11:預約取消失敗)');
			$table->string('user_id', 32)->comment('處理人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ad_edi_list');
	}

}

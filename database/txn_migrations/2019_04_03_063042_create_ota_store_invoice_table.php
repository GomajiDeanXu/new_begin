<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaStoreInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ota_store_invoice', function(Blueprint $table)
		{
			$table->integer('si_id', true)->comment('店家發票ID');
			$table->integer('sf_id')->default(0)->index('idx_sf_id')->comment('店家請款ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店 ID (對應 gomaji.store_branch_total.branch_id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->integer('flag')->default(1)->index('idx_flag')->comment('狀態(-1:刪除1:正常)');
			$table->string('inv_no', 45)->index('idx_inv_no')->comment('發票號碼');
			$table->integer('inv_amount')->default(0)->comment('發票金額');
			$table->integer('inv_ts')->default(0)->index('idx_inv_ts')->comment('發票收到日期');
			$table->integer('cus_inv_ts')->default(0)->index('idx_cus_inv_ts')->comment('發票開立日期');
			$table->string('backend_acc', 45)->index('idx_backend_acc')->comment('建立者帳號');
			$table->string('memo')->nullable()->comment('備註');
			$table->integer('requistion_ts')->default(0)->index('idx_requistion_ts')->comment('請款時間 (對應transaction.ota_store_finance.requistion_ts');
			$table->integer('type')->default(1)->index('idx_type')->comment('資料類型 (對應 transaction.ota_store_finance.type');
			$table->integer('in_full')->default(0)->index('idx_in_full')->comment('全額發票(0:否1:是)');
			$table->string('tax_type', 5)->default('')->index('idx_tax_type')->comment('稅別碼');
			$table->integer('payment')->default(0);
			$table->integer('tax')->default(0);
			$table->integer('deduct_type')->default(1)->index('idx_deduct_type');
			$table->string('invoice_id', 45)->nullable();
			$table->string('si_type', 5)->default('')->index('idx_si_type')->comment('單別');
			$table->string('rec_no', 11)->default('')->index('idx_rec_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ota_store_invoice');
	}

}

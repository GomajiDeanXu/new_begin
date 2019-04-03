<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_invoice', function(Blueprint $table)
		{
			$table->integer('si_id', true)->comment('主Key');
			$table->integer('sf_id')->default(0)->index('sf_id')->comment('店家請款ID');
			$table->integer('store_id')->default(0)->index('store_id')->comment('店家ID');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('flag')->default(1)->index('flag')->comment('狀態(-1:刪除1:正常)');
			$table->string('inv_no', 45)->index('inv_no')->comment('發票號碼');
			$table->integer('inv_amount')->default(0)->comment('發票金額');
			$table->integer('inv_ts')->default(0)->index('inv_ts')->comment('收到發票日期');
			$table->integer('cus_inv_ts')->default(0)->index('cus_inv_ts')->comment('發票開立日期');
			$table->string('backend_acc', 45)->index('backend_acc')->comment('建立者帳號');
			$table->string('memo')->nullable()->comment('備註');
			$table->integer('requistion_ts')->default(0)->index('requistion_ts')->comment('請款日期');
			$table->integer('type')->default(1)->index('type')->comment('資料類型(參見store_finance.type)');
			$table->integer('in_full')->default(0)->index('in_full')->comment('1:全額折抵,0:非全額折抵');
			$table->string('tax_type', 5)->default('')->index('tax_type')->comment('稅別碼(參見flag_mapping)');
			$table->integer('payment')->default(0)->comment('發票貨款');
			$table->integer('tax')->default(0)->comment('稅額');
			$table->integer('deduct_type')->default(1)->index('deduct_type')->comment('扣抵區分(參見flag_mapping)');
			$table->string('invoice_id', 45)->nullable()->comment('統一編號');
			$table->string('si_type', 5)->default('')->index('si_type')->comment('單別(參見flag_mapping)');
			$table->string('rec_no', 11)->default('')->index('rec_no')->comment('收據號碼');
			$table->integer('sim_id')->nullable()->default(0)->comment('對應store_invoice_main.sim_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_invoice');
	}

}

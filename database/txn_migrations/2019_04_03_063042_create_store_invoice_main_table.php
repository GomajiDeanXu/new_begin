<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreInvoiceMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_invoice_main', function(Blueprint $table)
		{
			$table->integer('sim_id', true)->comment('主Key');
			$table->integer('sf_id')->default(0)->comment('店家請款ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->boolean('invoice_type')->nullable()->comment('店家請款方式(by請款方式&結算日期彙開）)');
			$table->integer('flag')->default(1)->comment('狀態(-1:刪除1:正常)');
			$table->integer('requistion_ts')->nullable()->comment('結算時間');
			$table->string('inv_no', 45)->comment('發票號碼');
			$table->string('rec_no', 11)->default('')->comment('收據號碼');
			$table->integer('inv_amount')->default(0)->comment('發票金額');
			$table->string('backend_acc', 45)->comment('建立者帳號');
			$table->integer('payment')->default(0)->comment('發票貨款');
			$table->integer('tax')->default(0)->comment('稅額');
			$table->integer('inv_ts')->default(0)->comment('發票收到日期');
			$table->integer('cust_inv_ts')->default(0)->comment('發票開立日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_invoice_main');
	}

}

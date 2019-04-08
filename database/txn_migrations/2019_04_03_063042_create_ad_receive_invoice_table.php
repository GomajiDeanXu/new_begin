<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdReceiveInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ad_receive_invoice', function(Blueprint $table)
		{
			// $table->primary(['invoice_id','create_ts']);
			$table->integer('invoice_id', true)->comment('發票id')
				->index('idx_invoice_id');
			$table->integer('finance_id')
				->index('idx_finance_id')
				->comment('結帳id
ad_finance.finance_id');
			$table->string('inv_no', 45)->default('')->comment('發票號碼');
			$table->integer('inv_amount')->default(0)->comment('發票開立金額');
			$table->integer('payment')->comment('發票貨款');
			$table->integer('tax')->comment('稅額');
			$table->string('tax_type', 5)->default('')->comment('稅別碼');
			$table->integer('inv_id')->comment('統一編號');
			$table->integer('inv_ts')->default(0)->comment('發票收到時間');
			$table->integer('cus_inv_ts')->comment('發票開立日期');
			$table->boolean('deduct_type')->comment('扣抵區分');
			$table->string('rec_no', 11)->default('')->comment('收據號碼');
			$table->boolean('flag')->default(0)->comment('0: 刪除 / 1: 正常');
			$table->integer('create_ts')->default(0);
			$table->string('memo', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ad_receive_invoice');
	}

}

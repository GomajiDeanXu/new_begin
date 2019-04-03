<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdStoreInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ad_store_invoice', function(Blueprint $table)
		{
			$table->integer('asi_id', true);
			$table->integer('finance_id')->index('finance_id')->comment('ad_finance.finance_id');
			$table->integer('money')->comment('開立金額');
			$table->string('inv_no', 45)->comment('發票號碼');
			$table->integer('inv_ts')->comment('發票開立日期');
			$table->boolean('flag')->index('flag')->comment('資料有效碼[0]預設[-1]開立失敗');
			$table->integer('b_flag')->nullable()->default(0)->comment('急印狀態\n[0]:預設\n[1]:已印');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ad_store_invoice');
	}

}

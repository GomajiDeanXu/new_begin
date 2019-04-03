<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreChargetypeInvoiceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('store_chargetype_invoice', function(Blueprint $table)
		{
			$table->integer('sci_id', true);
			$table->integer('store_id')->index('idx_store_id')->comment('store_info.store_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->boolean('charge_type')->comment('1:行銷贊助費,2:刊登費');
			$table->string('sell_item')->default('')->comment('銷售品名');
			$table->string('invoice_cycle', 20)->comment('結算批次 i.e.,20170401');
			$table->integer('inv_amount')->comment('發票金額');
			$table->boolean('inv_flag')->default(0)->comment('處理狀態,0:未處理(預設)，1:已開立，-1：開立失敗');
			$table->string('inv_no', 45)->default('')->comment('發票號碼');
			$table->integer('inv_ts')->default(0)->comment('發票開立日期');
			$table->string('sf_id_list', 200)->comment('對應的扣款月結單序號');
			$table->string('memo', 100)->nullable()->comment('備註');
			$table->integer('create_ts')->comment('建立時間');
			$table->integer('modify_ts')->comment('異動時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('store_chargetype_invoice');
	}

}

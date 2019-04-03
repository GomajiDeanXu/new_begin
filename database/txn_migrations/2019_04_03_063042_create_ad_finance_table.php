<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdFinanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ad_finance', function(Blueprint $table)
		{
			$table->integer('finance_id', true);
			$table->integer('branch_id')->index('branch_id')->comment('分店ID');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('store_id')->default(0)->index('store_id')->comment('店家ID');
			$table->integer('edi_id')->index('edi_id');
			$table->integer('ad_number')->default(0)->comment('廣告交換份數');
			$table->integer('rating_number')->default(0)->comment('行銷贊助份數');
			$table->integer('ad_money')->default(0)->comment('廣告交換金額');
			$table->integer('rating_money')->default(0)->comment('行銷贊助金額');
			$table->integer('money_split')->default(0)->comment('店家應開立發票/收據金額');
			$table->integer('allocate_ts')->default(0)->comment('可撥款日期');
			$table->integer('allocate_finish_ts')->default(0)->comment('完成撥款日期');
			$table->integer('inv_ts')->default(0)->comment('發票收到時間');
			$table->text('memo', 65535)->nullable()->comment('備註');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(0)->index('flag')->comment('0: 刪除 / 1: 正常');
			$table->integer('b_flag')->default(0)->index('b_flag')->comment('撥款狀態');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ad_finance');
	}

}

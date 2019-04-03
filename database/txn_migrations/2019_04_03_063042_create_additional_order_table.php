<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdditionalOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('additional_order', function(Blueprint $table)
		{
			$table->integer('order_id', true)->comment('額外訂單序號');
			$table->bigInteger('order_no')->default(0)->index('idx_order_no')->comment('額外訂單編號');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('原訂單編號(transaction.user_purchases.bill_no)');
			$table->char('agent_type', 8)->default('')->comment('付費方式');
			$table->boolean('deal_flag')->default(0)->index('idx_deal_flag')->comment('訂單狀態');
			$table->integer('amount')->default(0)->comment('金額');
			$table->smallInteger('buy_number')->default(0)->comment('購買份數');
			$table->smallInteger('refund_number')->default(0)->comment('退費份數');
			$table->integer('deal_ts')->default(0)->comment('訂單時間');
			$table->integer('paid_ts')->default(0)->comment('付費時間');
			$table->integer('refund_ts')->default(0)->comment('退費時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('additional_order');
	}

}

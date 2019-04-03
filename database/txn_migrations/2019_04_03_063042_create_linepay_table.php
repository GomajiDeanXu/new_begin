<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinepayTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('linepay', function(Blueprint $table)
		{
			$table->integer('line_id', true);
			$table->bigInteger('transaction_id')->default(0)->index('idx_transaction_id')->comment('line交易ID');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->string('payment_type', 10)->default('')->comment('付費方式');
			$table->integer('amount')->unsigned()->default(0)->comment('訂單金額');
			$table->integer('credit_card')->default(0)->comment('信用卡');
			$table->integer('balance')->default(0)->comment('餘額');
			$table->integer('discount')->default(0)->comment('折扣');
			$table->string('status', 10)->default('')->index('idx_status')->comment('交易狀態');
			$table->integer('date_create')->default(0)->comment('訂單成立時間');
			$table->integer('date_paid')->default(0)->comment('付款時間');
			$table->integer('date_refund')->default(0)->comment('退款時間');
			$table->boolean('flag')->default(0);
			$table->string('memo', 128)->nullable();
			$table->date('date_writeoff')->index('idx_date_writeoff');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('linepay');
	}

}

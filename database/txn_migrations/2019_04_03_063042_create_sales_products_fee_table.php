<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSalesProductsFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('sales_products_fee', function(Blueprint $table)
		{
			$table->integer('spf_id', true);
			$table->integer('sales_id')->default(0)->index('idx_sales_id');
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('products_fee')->default(0)->comment('應收行銷贊助費');
			$table->integer('remaining_amount')->default(0)->index('idx_remaining_amount')->comment('當期剩餘未扣金額');
			$table->integer('actual_amount')->default(0)->comment('當期實發金額');
			$table->integer('verify_amount')->default(0)->comment('當期店家核銷金額');
			$table->integer('date_cycle')->default(0)->index('idx_date_cycle')->comment('扣款月');
			$table->integer('create_ts')->default(0)->comment('資料建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('sales_products_fee');
	}

}

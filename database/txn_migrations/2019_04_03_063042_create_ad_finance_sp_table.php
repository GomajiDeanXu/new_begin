<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdFinanceSpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ad_finance_sp', function(Blueprint $table)
		{
			$table->integer('afsp_id', true)->comment('請款子方案ID');
			$table->integer('finance_id')->default(0)->index('finance_id')->comment('ad_finance.finance_id');
			$table->integer('branch_id')->index('branch_id')->comment('分店ID');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('sp_id')->default(0)->index('sp_id')->comment('子方案ID');
			$table->string('sp_ref_name', 20)->nullable()->comment('子方案簡稱');
			$table->integer('sp_price')->default(0)->comment('子方案單價');
			$table->integer('sp_org_price')->default(0)->comment('子方案原價');
			$table->integer('ad_number')->default(0)->comment('廣告交換份數');
			$table->integer('rating_number')->default(0)->comment('行銷贊助份數');
			$table->integer('ad_money')->default(0)->comment('廣告交換金額');
			$table->integer('rating_money')->default(0)->comment('行銷贊助金額');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(0)->index('flag')->comment('0: 刪除 / 1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ad_finance_sp');
	}

}

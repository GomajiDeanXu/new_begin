<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGmMoneyDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gm_money_detail', function(Blueprint $table)
		{
			$table->bigInteger('gm_money_id', true)->comment('行銷金序號');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->integer('gm_money_mon')->default(0)->comment('店家行銷金總額(deal_money-refund_money)');
			$table->integer('deal_money')->default(0)->comment('交易獲得行銷金');
			$table->integer('refund_money')->default(0)->comment('退貨扣除行銷金');
			$table->integer('create_ts')->default(0)->comment('發送時間');
			$table->boolean('resource_type')->default(0)->comment('行銷金來源 (1：買單優惠/ 2：BB/ 3：團購交易)');
			$table->integer('product_id')->default(0)->comment('商品ID');
			$table->string('memo')->nullable()->default('')->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('gm_money_detail');
	}

}

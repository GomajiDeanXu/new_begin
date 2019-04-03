<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRivalSubProducts2Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rival_sub_products_2', function(Blueprint $table)
		{
			$table->integer('rsp_id', true);
			$table->integer('rp_id')->default(0)->index('idx_rp_id')->comment('競業資訊商品ID');
			$table->integer('rsp_price')->default(0)->comment('方案團購價');
			$table->integer('rsp_org_price')->default(0)->comment('方案原價');
			$table->integer('rsp_order_no')->default(0)->comment('方案購買數');
			$table->boolean('rsp_flag')->default(1)->index('idx_rsp_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('rival_sub_products_2');
	}

}

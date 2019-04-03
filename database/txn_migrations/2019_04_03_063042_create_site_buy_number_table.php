<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteBuyNumberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('site_buy_number', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('date_rpt')->default(0)->index('idx_date_rpt')->comment('報表日期，yyyymm01 來表示 yyyymm');
			$table->string('site', 20)->default('')->index('idx_site');
			$table->integer('city_id')->default(0)->index('idx_city_id');
			$table->string('city_name', 36)->default('')->comment('城市名稱');
			$table->integer('product_id')->default(0)->comment('商品id');
			$table->integer('sp_id')->default(0);
			$table->integer('group_id')->nullable()->default(0)->comment('分店ID(gomaji.store_branch_total.branch_id)');
			$table->string('store_name', 45)->default('')->comment('店家名稱');
			$table->integer('price')->default(0)->comment('商品金額');
			$table->integer('buy_number')->default(0)->comment('購買份數');
			$table->integer('order_number')->default(0)->comment('unique');
			$table->integer('user_number')->default(0)->comment('unique');
			$table->integer('split_money')->default(0);
			$table->integer('order_no')->default(0);
			$table->integer('date_publish')->default(0)->index('idx_date_publish')->comment('商品上架日期');
			$table->integer('date_expiry')->default(0)->comment('商品下架日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('site_buy_number');
	}

}

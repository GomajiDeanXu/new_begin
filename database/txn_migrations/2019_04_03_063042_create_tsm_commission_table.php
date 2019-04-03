<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTsmCommissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('tsm_commission', function(Blueprint $table)
		{
			$table->increments('tsm_id');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('總店ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店ID');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品ID');
			$table->integer('sp_product_id')->default(0)->index('idx_sp_product_id')->comment('子商品ID');
			$table->string('store_name', 60)->default('')->comment('總店名稱');
			$table->string('branch_name', 60)->default('')->comment('分店名稱');
			$table->string('product_name', 254)->nullable()->comment('商品名稱(方案標)');
			$table->string('sp_product_name', 254)->nullable()->comment('子商品名稱(子方案標)');
			$table->dateTime('create_dt')->default('0000-00-00 00:00:00')->index('idx_create_dt')->comment('建立日期');
			$table->integer('price')->default(0)->comment('活動價(含稅)');
			$table->integer('cost_price')->default(0)->comment('進貨價(含稅)');
			$table->integer('total_net')->default(0)->comment('超級市場拆分前淨額');
			$table->float('tsm_commission_ratio', 11, 4)->default(0.0000)->comment('超級市場拆分比例');
			$table->integer('tsm_net')->default(0)->comment('超級市場淨額');
			$table->integer('gomaji_net')->default(0)->comment('GOMAJI淨額');
			$table->boolean('tsm_type')->default(0)->comment('賣場類別(1-家樂福)');
			$table->integer('coupon_id')->default(0)->comment('兌換券ID');
			$table->string('memo', 100)->nullable()->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('tsm_commission');
	}

}

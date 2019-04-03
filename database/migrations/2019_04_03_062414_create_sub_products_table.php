<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_products', function(Blueprint $table)
		{
			$table->integer('sp_id', true)->comment('子方案編號');
			$table->integer('product_id')->index('idx_product_id')->comment('商品編號');
			$table->string('sp_name', 254)->nullable()->comment('方案名稱');
			$table->string('sp_ref_name', 20)->nullable()->comment('子方案簡稱');
			$table->integer('sp_price')->default(0)->comment('售價');
			$table->integer('sp_org_price')->default(0)->comment('原價');
			$table->smallInteger('sp_product_num')->default(0)->comment('商品數量');
			$table->float('sp_avg_price', 7, 1)->default(0.0)->comment('件均價');
			$table->float('sp_avg_org_price', 7, 1)->default(0.0)->comment('件均原價');
			$table->integer('sp_order_no')->default(0)->comment('目前購買數量');
			$table->integer('sp_max_order_no')->default(0)->comment('團購總數量上限');
			$table->integer('sp_max_money')->default(0)->comment('團購總金額上限');
			$table->integer('sp_pre_buy_no')->default(1)->comment('每筆訂單能買的數量');
			$table->integer('sp_create_ts')->default(0)->comment('建立時間');
			$table->boolean('sp_flag')->default(0)->index('idx_sp_flag')->comment('子方案狀態');
			$table->integer('sp_display')->default(1)->index('idx_sp_display')->comment('是否於前台露出(0: 不顯示 / 1: 顯示)');
			$table->smallInteger('sp_radix')->default(1)->comment('方案人數');
			$table->char('sp_simple_code', 2)->default('');
			$table->boolean('sp_freight_terms')->nullable()->default(-1)->comment('免運條件');
			$table->boolean('sp_booking')->default(0)->comment('default:0; 1:皆適用; 2:平日; 3:假日');
			$table->integer('sp_tk_type_id')->default(0)->comment('多重方案票券類別');
			$table->integer('sp_order_no2')->nullable()->default(0);
			$table->integer('sp_max_order_no2')->default(0);
			$table->integer('flag')->default(0)->comment('子方案狀態(bitwise)');
			$table->integer('store_pickup_max')->nullable()->default(0)->comment('超取交易可購上限數');
			$table->timestamp('last_updated_time')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('sp_par_value')->nullable()->default(0)->comment('方案票面價(逾期每份可抵用金額)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sub_products');
	}

}

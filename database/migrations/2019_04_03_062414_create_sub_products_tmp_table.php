<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubProductsTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sub_products_tmp', function(Blueprint $table)
		{
			$table->increments('spt_id');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('reporter_to_store.rts_id');
			$table->string('sp_name', 254)->default('')->comment('方案名稱');
			$table->string('sp_ref_name', 20)->nullable()->comment('方案簡稱');
			$table->integer('sp_price')->default(0)->comment('特價');
			$table->integer('sp_org_price')->default(0)->comment('原價');
			$table->integer('sp_max_order_no')->default(0)->comment('方案團購上限數(0: 不限)');
			$table->integer('sp_pre_buy_no')->default(0)->comment('每筆交易可購上限');
			$table->smallInteger('sp_radix')->default(0)->comment('方案人數');
			$table->char('sp_simple_code', 2)->default('');
			$table->boolean('room_class')->default(0)->comment('房型');
			$table->string('room_class_other', 30)->nullable()->comment('其他房型');
			$table->boolean('number_guests')->default(0)->comment('人數限定');
			$table->string('number_guests_other', 30)->nullable()->comment('其他人數限定');
			$table->boolean('children_height_limit')->default(0)->comment('兒童身高限定');
			$table->boolean('children_age_limit')->default(0)->comment('兒童年齡限定');
			$table->integer('cost_extra_adult')->default(0)->comment('加一人加價金額');
			$table->boolean('extra_adult_limit')->default(0)->comment('最多可加人數');
			$table->string('extra_adult_contents', 40)->default('')->comment('加人內容包含(逗號分隔)(1: 含床 / 2: 含早餐 / 3: 含備品)');
			$table->string('extra_adult_contents_other', 120)->nullable()->comment('加人其他事項');
			$table->integer('cost_extra_bed')->default(0)->comment('加一床加價金額');
			$table->boolean('extra_bed_limit')->default(0)->comment('最多可加床數');
			$table->string('upgrade', 200)->nullable()->comment('可升等');
			$table->boolean('sp_freight_terms')->nullable()->default(-1)->comment('免運條件');
			$table->integer('sp_product_num')->default(0)->comment('商品數量');
			$table->float('sp_avg_price', 7, 1)->default(0.0)->comment('件均特價');
			$table->float('sp_avg_org_price', 7, 1)->default(0.0)->comment('件均原價');
			$table->boolean('sp_booking')->default(0)->comment('default:0; 1:皆適用; 2:平日; 3:假日');
			$table->integer('sp_tk_type_id')->default(0)->comment('預產多重方案票券類別');
			$table->integer('store_pickup_max')->nullable()->default(0)->comment('超取交易可購上限數');
			$table->integer('sp_par_value')->default(0)->comment('方案票面價(逾期每份可抵用金額)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sub_products_tmp');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductserviceFeeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productservice_fee', function(Blueprint $table)
		{
			$table->integer('psf_id', true);
			$table->integer('store_id')->index('idx_store_id')->comment('店家id，gomaji.store_info.store_id');
			$table->integer('group_id')->default(0)->comment('分店id，gomaji.store_branch_total.branch_id 備用預留');
			$table->integer('pre_schedule_id')->default(0)->index('idx_pre_schedule_id')->comment('取號id，gomaji.product_pre_schedule.pre_schedule_id');
			$table->integer('rts_id')->default(0)->index('idx_rts_id')->comment('收單id，gomaji.reporter_to_store.rts_id');
			$table->integer('spt_id')->default(0)->index('idx_spt_id')->comment('暫存方案編號，sub_products_tmp.spt_id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品編號，gomaji.products.product_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id')->comment('方案編號，gomaji.sub_products.sp_id');
			$table->integer('start_num')->default(0)->comment('起始數量');
			$table->integer('end_num')->default(0)->comment('結束數量');
			$table->integer('ui_price')->default(0)->comment('UI的建議價');
			$table->float('ui_ratio', 11, 4)->nullable()->comment('UI的拆分比例');
			$table->float('service_rate', 11, 4)->default(0.0000)->comment('平台服務費比例，如：0.05');
			$table->integer('service_fee')->default(0)->comment('服務費金額');
			$table->string('memo', 100)->nullable()->comment('備註');
			$table->integer('create_ts')->nullable()->comment('建立時間');
			$table->string('create_user', 30)->nullable()->comment('建立人員');
			$table->integer('modify_ts')->nullable()->comment('異動時間');
			$table->string('modify_user', 30)->nullable()->comment('異動人員');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('productservice_fee');
	}

}

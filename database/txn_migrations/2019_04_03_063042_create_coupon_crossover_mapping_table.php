<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponCrossoverMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_crossover_mapping', function(Blueprint $table)
		{
			$table->integer('ccm_id', true)->comment('系統流水號');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('user_pruchase.purchase_id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('gomaji.products.product_id');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon.coupon_id');
			$table->string('co_product_id', 20)->default('0')->comment('廠商的商品代碼');
			$table->string('event_id', 60)->default('0')->comment('廠商的活動代碼gomaji.crossover_event.event_id');
			$table->string('merchant_id', 20)->default('')->comment('gomaji.crossover_mapping.merchant_id');
			$table->string('voucher_no', 20)->default('0')->index('idx_voucher_no')->comment('廠商的序號');
			$table->integer('create_ts')->default(0)->comment('建立時間(索取序號的時間)');
			$table->integer('use_ts')->default(0)->index('idx_use_ts')->comment('序號被使用的時間');
			$table->integer('send_ts')->default(0)->comment('發送序號的時間');
			$table->boolean('flag')->default(0)->index('indx_flag')->comment('0 : 無效(不可使用) 1 : 有效(可使用)2 : 已使用 3：已取消’');
			$table->boolean('process_status')->default(0)->comment('0 : 未處理 1 : 處理中 2 : 已處理');
			$table->string('return_code', 30)->default('0')->comment('廠商的回應代碼');
			$table->string('return_msg', 100)->default('0')->comment('廠商的回應訊息');
			$table->string('client_order_number', 50)->default('0')->comment('廠商的回應client_order_number');
			$table->string('voucher_guid', 50)->default('0')->comment('廠商回應的voucher_guid');
			$table->integer('generate_date')->default(0)->comment('廠商回應的產生序號時間');
			$table->integer('expire_start_date')->default(0)->comment('廠商回應的序號生效時間');
			$table->integer('expire_end_date')->default(0)->comment('廠商回應的序號失效時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('coupon_crossover_mapping');
	}

}

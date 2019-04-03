<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMohistCrossMappingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('mohist_cross_mapping', function(Blueprint $table)
		{
			$table->increments('id')->comment('系統流水號');
			$table->integer('purchase_id')->unsigned()->default(0)->index('idx_purchase_id')->comment('user_pruchase.purchase_id');
			$table->integer('product_id')->unsigned()->default(0)->index('idx_product_id')->comment('gomaji.products.product_id');
			$table->integer('coupon_id')->unsigned()->default(0)->comment('coupon.coupon_id');
			$table->string('product_sernum', 50)->default('');
			$table->string('tick_sernum', 50)->default('0')->index('idx_tick_sernum');
			$table->string('qr_no', 50)->default('0')->index('idx_qr_no');
			$table->integer('product_price')->unsigned()->default(0);
			$table->dateTime('create_ts')->comment('建立時間(索取序號的時間)');
			$table->dateTime('use_ts')->comment('序號被使用的時間');
			$table->dateTime('send_ts')->comment('發送序號的時間');
			$table->dateTime('cancel_ts')->comment('序號作廢時間');
			$table->boolean('flag')->default(0)->comment('0 : 無效(不可使用) 1 : 有效(可使用)2 : 已使用 3：已取消');
			$table->boolean('process_status')->default(0)->comment('0 : 未處理 1 : 處理中 2 : 已處理');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('mohist_cross_mapping');
	}

}

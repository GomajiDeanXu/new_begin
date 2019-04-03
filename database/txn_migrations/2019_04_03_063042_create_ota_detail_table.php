<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ota_detail', function(Blueprint $table)
		{
			$table->integer('ota_detail_id', true);
			$table->integer('ota_id')->default(0)->index('idx_ota_id')->comment('OTA訂單資訊外來鍵');
			$table->integer('version_id')->default(0)->comment('購買當下房型資料外來鍵');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon外來鍵');
			$table->integer('sf_id')->default(0)->index('idx_sf_id')->comment('GOMAJI結帳批號');
			$table->integer('refund_amount_user')->default(0)->comment('退費後退給消費者的金額');
			$table->integer('refund_amount_store')->default(0)->comment('退費後退給店家的金額');
			$table->boolean('status')->default(0)->index('idx_status')->comment('單位為一天的訂單狀態');
			$table->integer('money')->default(0)->comment('此coupon金額');
			$table->boolean('no_show')->default(0)->index('idx_no_show')->comment('今日消費者是否未出現');
			$table->integer('checkin_ts')->default(0)->comment('單位為一天的入住時間');
			$table->integer('verify_ts')->default(0)->comment('coupon被核銷時間，給店家看的');
			$table->integer('real_verify_ts')->default(0)->comment('coupon真的被系統核銷的時間');
			$table->integer('create_ts')->default(0)->comment('coupon建立時間，攸關退費');
			$table->integer('refund_ts')->default(0)->comment('單位為一天的coupon退費進單時間');
			$table->boolean('is_verify_coupon')->default(0)->comment('是否可自動核銷，0：可核銷 1：不可核銷');
			$table->integer('is_verify_coupon_ts')->default(0)->comment('標記不可核銷時間(會影響OTA自動核銷程式)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ota_detail');
	}

}

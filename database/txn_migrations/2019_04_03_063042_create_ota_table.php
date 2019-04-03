<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ota', function(Blueprint $table)
		{
			$table->integer('ota_id', true);
			$table->integer('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單編號外來鍵');
			$table->integer('hotel_id')->default(0)->comment('旅館資料外來鍵');
			$table->integer('room_id')->default(0)->index('idx_room_id')->comment('房型資料外來鍵');
			$table->integer('version_id')->default(0)->comment('購買當下房型資料外來鍵');
			$table->integer('checkin_ts')->default(0)->comment('入住時間');
			$table->integer('checkout_ts')->default(0)->comment('退房時間');
			$table->bigInteger('gm_uid')->index('idx_gm_uid')->comment('gomaji.user.gm_uid');
			$table->string('customer_name', 50)->default('')->index('idx_customer_name')->comment('入住人姓名');
			$table->string('customer_phone', 45)->default('')->index('idx_customer_phone')->comment('入住人聯絡電話');
			$table->boolean('customer_number')->default(0)->comment('入住人數');
			$table->string('customer_comment', 150)->default('')->comment('客人留言');
			$table->boolean('agree_flag')->default(0)->comment('0 : 店家未同意 1 : 店家已同意點燈退費');
			$table->integer('agree_ts')->default(0)->comment('有當天退費、不規則退費，店家點燈時間');
			$table->integer('mail_ts')->default(0)->comment('發mail通知店家時間');
			$table->string('memo', 200)->default('')->comment('OTA訂單備註');
			$table->integer('return_flag')->default(0)->comment('記錄需不需要還房標籤(0：未處理或不需處理 / 1：還房中 / 2：已還房)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ota');
	}

}

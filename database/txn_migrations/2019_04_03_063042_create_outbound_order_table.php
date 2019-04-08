<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundOrderTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('outbound_order', function(Blueprint $table)
		{
			$table->integer('obo_id', true);
			$table->boolean('site_id')->default(1)->comment('1-outbound / 2-EAN ');
			$table->integer('purchase_id')->default(0)->index('idx_purchase_id')->comment('訂單編號外來鍵');
			$table->integer('hotel_id')->default(0)->comment('旅館資料外來鍵');
			$table->integer('room_id')->default(0)->index('idx_room_id')->comment('房型資料外來鍵');
			$table->string('room_name', 100)->comment('房型名稱');
			$table->integer('plan_id')->default(0)->comment('購買當下房型資料外來鍵');
			$table->string('plan_name', 100)->comment('方案名稱');
			$table->dateTime('checkin_ts')->nullable();
			$table->dateTime('checkin_ts')
			->default('0000-00-00 00:00:00')->comment('入住時間(當地)')->change();
			$table->dateTime('checkout_ts')->nullable();
			$table->dateTime('checkout_ts')
			->default('0000-00-00 00:00:00')->comment('退房時間(當地)')->change();
			$table->boolean('time_zone')->default(0)->comment('當地時區，0=GMT＋0');
			$table->boolean('num_otona')->default(0)->comment('入住大人人數');
			$table->boolean('num_kodomo')->default(0)->comment('入住小孩人數');
			$table->boolean('num_child_bed')->default(0)->comment('入住小孩佔床人數');
			$table->boolean('num_child_nobed')->default(0)->comment('入住小孩不佔床人數');
			$table->string('ean_child_ages', 20)->default('')->comment('EAN小孩歲數');
			$table->bigInteger('gm_uid')->index('idx_gm_uid')->comment('gomaji.user.gm_uid');
			$table->string('passenger_name', 50)->default('')->comment('入住人姓名');
			$table->string('passenger_mobile_phone', 45)->default('')->comment('入住人聯絡電話');
			$table->string('passenger_message', 100)->default('')->comment('客人留言');
			$table->string('currency', 10)->default('')->comment('幣別');
			$table->float('exchange_rate', 5, 4)->default(0.0000)->comment('訂單成立時的匯率');
			$table->integer('org_amount')->default(0)->comment('原幣別訂單總額');
			$table->integer('marketing_fee')->default(0)->comment('EAN給gomaji的佣金');
			$table->string('memo', 200)->default('')->comment('outbound訂單備註');
			$table->dateTime('create_ts')->comment('建立日期時間');
			$table->dateTime('modify_ts')->comment('修改日期時間');
			$table->string('buyer_address')->default('')->comment('消費者得購買地址');
			$table->string('reservation_code', 50)->default('')->comment('Relux訂房回傳的預約單號');
			$table->text('ean_retrieve_result', 65535)->nullable()->comment('retrieve booking cancel_penalties');
			$table->text('fees', 65535)->nullable()->comment('EAN額外收費項目');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('outbound_order');
	}

}

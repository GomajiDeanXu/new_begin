<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundOrderDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('outbound_order_detail', function(Blueprint $table)
		{
			$table->integer('obod_id', true);
			$table->integer('obo_id')->default(0)->index('idx_ota_id')->comment('outbound_order.obo_id');
			$table->integer('plan_id')->default(0)->comment('購買當下房型資料外來鍵');
			$table->integer('coupon_id')->default(0)->index('idx_coupon_id')->comment('coupon外來鍵');
			$table->boolean('status')->default(0)->comment('單位為一天的訂單狀態,0:未入住，1:已入住核銷，2:已產兌換券，3:待退');
			$table->integer('pernight_fee')->default(0)->comment('單日房價');
			$table->integer('orgpernight_fee')->default(0)->comment('單日房價(原幣別)');
			$table->float('charge_percentage', 5, 4)->nullable()->default(0.0000)->comment('沒收訂金的比率(原幣別比率)');
			$table->integer('charge_value')->nullable()->default(0)->comment('沒收訂金的定額(原幣別)');
			$table->integer('charge_amount')->default(0)->comment('實際沒收的金額(原幣別)');
			$table->integer('refund_amount_user')->default(0)->comment('退給消費者的金額(台幣)');
			$table->boolean('no_show')->default(0)->comment('今日消費者是否未出現');
			$table->dateTime('checkin_ts')->nullable();
			$table->dateTime('checkin_ts')
			->default('0000-00-00 00:00:00')->comment('單位為一天的入住時間(當地)')->change();
			$table->dateTime('real_verify_ts')->nullable();
			$table->dateTime('real_verify_ts')
			->default('0000-00-00 00:00:00')->comment('coupon被系統核銷的時間')->change();
			$table->dateTime('create_ts')->nullable();
			$table->dateTime('create_ts')
			->default('0000-00-00 00:00:00')->comment('coupon建立時間，攸關退費')->change();
			$table->dateTime('refund_ts')->nullable();
			$table->dateTime('refund_ts')
			->default('0000-00-00 00:00:00')->comment('完成退費時間')->change();
			$table->boolean('refund_remark')->nullable()->default(0)->comment('Relux 退費API是否回覆備註，客服要重算沒收金, 0:無備註,1:有備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('outbound_order_detail');
	}

}

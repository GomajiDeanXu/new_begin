<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOutboundCheckbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('outbound_checkback', function(Blueprint $table)
		{
			$table->integer('obckb_id', true);
			$table->string('reservation_code', 50)->default('')->index('idx_reservation_code')->comment('fromRelux:預約番號');
			$table->string('status', 10)->default('')->comment('fromRelux:狀態');
			$table->string('partner_name', 100)->default('')->comment('fromRelux:partner_name');
			$table->string('partner_res_code', 100)->default('')->comment('fromRelux:partner_res_code');
			$table->integer('reservation_number')->default(0)->comment('fromRelux:過去預約數');
			$table->string('hotel_name', 100)->default('')->comment('fromRelux:宿名');
			$table->char('paid_ts', 20)->default('')->comment('fromRelux:預約日');
			$table->char('checkin_ts', 20)->default('')->comment('fromRelux:入住日');
			$table->char('checkout_ts', 20)->default('')->comment('fromRelux:退房日');
			$table->integer('org_amount')->default(0)->comment('fromRelux:預約金額');
			$table->integer('commission')->default(0)->comment('fromRelux:付款金額');
			$table->string('store_name', 100)->default('')->comment('from GOMAJI:店家名稱');
			$table->integer('group_id')->default(0)->comment('from GOMAJI:GID');
			$table->string('agent_type', 20)->default('')->comment('from GOMAJI:付費方式');
			$table->integer('gomaji_nt_money')->default(0)->comment('fromGOMAJI:台幣金額');
			$table->integer('gomaji_org_amount')->default(0)->comment('fromGOMAJI:支付原幣金額');
			$table->integer('gomaji_nt_amount')->default(0)->comment('fromGOMAJI:支付台幣金額');
			$table->integer('gomaji_org_commission')->default(0)->comment('fromGOMAJI:佣金原幣金額');
			$table->integer('gomaji_nt_commission')->default(0)->comment('fromGOMAJI:佣金台幣金額');
			$table->float('gomaji_commission_rate', 5, 4)->default(0.0000)->comment('fromGOMAJI:佣金比率');
			$table->string('checkback_result', 200)->default('0')->comment('fromGOMAJI:比對結果');
			$table->dateTime('create_ts')->comment('建立日期時間');
			$table->char('checkback_YYYYMM', 6)->default('')->index('idx_checkback_YYYYMM')->comment('對帳年月');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('outbound_checkback');
	}

}

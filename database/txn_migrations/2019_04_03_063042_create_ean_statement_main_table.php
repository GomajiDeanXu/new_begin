<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEanStatementMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ean_statement_main', function(Blueprint $table)
		{
			$table->integer('ean_stm_id', true);
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('gomaji訂單編號');
			$table->bigInteger('itinerary_id')->default(0)->index('idx_itinerary_id')->comment('ean 訂房編號 對應transaction.outbound_order.reservation_code');
			$table->boolean('status')->default(0)->comment('0:init 1：matched(交易符合) 2：unmatched(ean對帳檔無) 3：unmatched(gomaji無)');
			$table->integer('bflag')->default(1)->comment('1:正常交易 2:退費成功 4:退費未平帳 8:沒收款未平帳 16:已核銷(可確認佣金) 32:異常訂單 64:異常訂單已退款 128:爭議訂單 256:爭議訂單已退款 ');
			$table->boolean('intertemporal_flag')->default(0)->comment('0:當期 1:跨期');
			$table->dateTime('ean_checkin_dt')->default('0000-00-00 00:00:00')->comment('ean記錄的入住時間');
			$table->dateTime('ean_checkout_dt')->default('0000-00-00 00:00:00')->comment('ean記錄的退房時間');
			$table->float('ean_payable_amount', 11, 4)->default(0.0000)->comment('ean實際支付金額，依ean_statement_detail對應的正向負向金額加總');
			$table->string('ean_refund_reason')->default('0')->comment('ean記錄退款原因');
			$table->dateTime('create_dt')->default('0000-00-00 00:00:00')->comment('建立時間');
			$table->dateTime('modify_dt')->default('0000-00-00 00:00:00')->comment('修改時間');
			$table->string('memo')->default('')->comment('備註');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ean_statement_main');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFirstBuyByPhoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('first_buy_by_phone', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('mobile_phone', 12)->default('')->index('idx_mobile_phone')->comment('手機號碼');
			$table->integer('gm_uid')->default(0)->index('idx_gmuid')->comment('會員編號');
			$table->integer('paid_ts')->default(0)->index('idx_paidts')->comment('第一次付費時間');
			$table->integer('last_ts')->default(0)->index('idx_last_ts')->comment('最後一次付費時間');
			$table->integer('rs_ts')->default(0)->comment('最後一次購買 RS 商品時間');
			$table->integer('bt_ts')->default(0)->comment('最後一次購買 BT 商品時間');
			$table->integer('lf_ts')->default(0)->comment('最後一次購買 LF 商品時間');
			$table->integer('sh_ts')->default(0)->comment('最後一次購買 SH 商品時間');
			$table->integer('es_ts')->default(0)->comment('最後一次購買 ES 商品時間');
			$table->integer('ota_ts')->default(0)->comment('最後一次購買 OTA 商品時間');
			$table->integer('oa_paid_ts')->default(0)->comment('第一次使用買單優惠時間');
			$table->integer('oa_ts')->default(0)->comment('最後一次使用買單優惠時間');
			$table->integer('buy123_ts')->default(0)->comment('最後一次購買 SH+ 商品時間');
			$table->string('bill_no', 20)->default('0')->index('idx_billno')->comment('第一次購買的訂單編號(團購交易對應user_purchases.bill_no,生活交易對應8700+user_purchase_buy123.order_no)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('first_buy_by_phone');
	}

}

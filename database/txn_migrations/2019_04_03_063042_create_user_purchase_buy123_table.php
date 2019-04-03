<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserPurchaseBuy123Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('user_purchase_buy123', function(Blueprint $table)
		{
			$table->increments('purchase_buy123_id');
			$table->bigInteger('order_no')->default(0)->unique('un_order_no')->comment('訂單編號 kb.orderid');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('商品代碼 kb.iterm_id');
			$table->string('product_name', 254)->nullable()->comment('商品名稱 kb.iterm_name');
			$table->string('sub_prodname', 254)->nullable()->comment('方案名稱 kb.product_name');
			$table->string('fullname', 45)->default('')->comment('客戶名稱 kb.buyername');
			$table->string('email', 45)->default('')->comment('客戶E-Mail kb.email');
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid')->comment('Gomaji會員編號 kb.account');
			$table->string('buy_uid', 45)->default('')->comment('生活會員編號 kb.id');
			$table->string('status', 15)->default('')->index('idx_status')->comment('訂單狀態 [ pending:等待付款 / paid:已付款 / cancel:取消 ] kb.payment_status');
			$table->string('consignee', 45)->comment('收件人 kb.receivername');
			$table->string('city', 36)->default('')->comment('收件縣市 kb.receiver_city_name');
			$table->string('district', 12)->default('')->comment('收件鄉鎮區 kb.receiver_area_name');
			$table->string('address', 45)->nullable()->comment('收件地址 kb.receiveraddress');
			$table->string('mobile', 45)->default('')->comment('收件人電話 kb.receiverphone');
			$table->dateTime('order_ts')->nullable()->index('idx_order_ts')->comment('成單日期(購買日期) kb.ts');
			$table->dateTime('shipment_ts')->nullable()->comment('出貨日期 kb.shipping_ts,超取付訂單：客戶取貨截止時間');
			$table->string('shipment_no', 45)->default('')->comment('貨運編號 kb.ship_no');
			$table->string('freighter', 45)->default('')->comment('貨運商 kb.shipping_company');
			$table->string('shipment_status', 50)->nullable()->comment('配送狀態 kb.shipping_status');
			$table->dateTime('paid_ts')->nullable()->comment('付款日期 kb.pay_ts');
			$table->char('paid_type', 45)->default('')->comment('付款方式 kb.payment_method');
			$table->string('paidtype_desc', 250)->nullable()->default('')->comment('--');
			$table->integer('order_amount')->unsigned()->default(0)->comment('訂單金額 kb.pd_amount');
			$table->integer('cash')->unsigned()->default(0)->comment('實付金額 kb.payment_amount');
			$table->integer('discount')->unsigned()->default(0)->comment('折扣金額 kb.coupon_amount');
			$table->integer('bank_reward')->unsigned()->default(0)->comment('紅利折抵 kb.red_amount');
			$table->integer('use_points')->unsigned()->nullable()->default(0)->comment('使用的GOMAJI點數');
			$table->integer('use_bonus')->unsigned()->nullable()->default(0)->comment('使用的GOMAJI購物金');
			$table->boolean('piece')->default(0)->comment('份數 kb.product_quantity');
			$table->string('cdn_path', 250)->nullable()->default('')->comment('CDN圖檔路徑 kb.square_img');
			$table->string('org_path', 250)->nullable()->default('')->comment('原圖路徑 kb.square_img');
			$table->integer('reward_points')->nullable()->comment('在途點數 此單贈送的點數');
			$table->dateTime('send_points_ts')->nullable()->comment('reward_points 得到點數時間');
			$table->boolean('user_agent')->nullable()->index('idx_user_agent')->comment('區分訂單來源(1:pc, 2:mweb, 3:app-android, 4:app-ios) kb.os');
			$table->boolean('rate_flag')->nullable()->comment('是否已評價(0:未評價，1:已評價) kb.pr_id');
			$table->string('click_id')->nullable()->default('')->comment('導購來源(識別碼) 生活夥伴從Cookie 抓 kb.click_id)');
			$table->string('rid')->nullable()->default('')->comment('導購來源(識別碼) 生活夥伴從Cookie 抓 kb.rid)');
			$table->dateTime('refund_final_ts')->default('1900-01-01 12:34:56')->comment('退貨成立時間');
			$table->dateTime('refund_ts')->default('1900-01-01 12:34:56')->comment('退貨申請時間');
			$table->string('refund_url', 500)->nullable()->default('')->comment('退費URL');
			$table->string('refund_url_app', 500)->nullable()->default('')->comment('APP退費URL');
			$table->string('review_url', 500)->nullable()->default('')->comment('評價URL');
			$table->string('review_url_app', 500)->nullable()->default('')->comment('APP評價URL');
			$table->timestamp('last_updated_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('receipt_no', 15)->nullable()->comment('發票號碼');
			$table->dateTime('receipt_date')->nullable()->comment('發票日期');
			$table->string('receipt_checksum', 10)->nullable()->comment('發票隨機碼');
			$table->string('ship_method', 5)->nullable()->comment('運送類型：0: 一般,1:冷凍');
			$table->integer('refund_amount')->unsigned()->default(0)->comment('實退金額 kb.refund_amount');
			$table->text('detail', 65535)->nullable()->comment('購買規格及數量 kb.detail');
			$table->text('refund_detail', 65535)->nullable()->comment('退貨規格及數量 kb.refund_detail');
			$table->string('cancel_url', 500)->nullable()->default('')->comment('取消訂單URL');
			$table->string('cancel_url_app', 500)->nullable()->default('')->comment('APP取消訂單URL');
			$table->string('store_name', 45)->nullable()->default('')->comment('取貨店名');
			$table->string('store_address', 45)->nullable()->default('')->comment('取貨店地址');
			$table->integer('bflag')->default(0)->comment('訂單bflag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('user_purchase_buy123');
	}

}

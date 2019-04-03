<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIbonTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ibon', function(Blueprint $table)
		{
			$table->integer('ibon_id', true);
			$table->integer('date_create')->default(0)->index('idx_date_create')->comment('訂單產生時間(交易時間)');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->char('status', 8)->default('')->index('idx_status')->comment('init : 初始化
success : 訂單成立
paid : 付款成功
fail : 訂單失敗
refund : 退款');
			$table->integer('date_paid')->default(0)->index('idx_date_paid')->comment('銷帳時間
');
			$table->integer('date_refund')->default(0)->index('idx_date_refund')->comment('退款時間');
			$table->string('email', 45)->default('')->index('idx_emial')->comment('消費者 email');
			$table->string('full_name', 45)->default('')->index('idx_full_name');
			$table->string('mobile_phone', 45)->default('')->index('idx_mobile_phone');
			$table->integer('amount')->unsigned()->default(0)->index('idx_amount')->comment('交易金額');
			$table->integer('duedate')->default(0)->comment('繳費期限');
			$table->char('ibon_num', 12)->default('')->unique('idx_ibon_num_UNIQUE')->comment('ibon 繳費代碼');
			$table->char('store_id', 6)->default('')->comment('門市店號');
			$table->char('shop_id', 2)->default('')->comment('業者代碼');
			$table->char('detail_num', 14)->default('')->comment('安源序號');
			$table->char('status_code', 4)->default('')->comment('狀態代碼');
			$table->char('barcode1', 9)->default('')->comment('第一段條碼');
			$table->char('barcode2', 16)->default('')->comment('第二段條碼');
			$table->char('barcode3', 15)->default('')->comment('第三段條碼');
			$table->char('product_code', 20)->default('')->comment('商品代碼');
			$table->string('memo')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ibon');
	}

}

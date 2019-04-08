<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLineShoppingPostbackTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('line_shopping_postback', function(Blueprint $table)
		{
			$table->integer('postback_id', true);
			$table->bigInteger('purchase_id')->default(0)->comment('對應 transaction.user_purchases.purchase_id');
			$table->bigInteger('bill_no')->default(0)->comment('訂單編號 transaction.user_purchases.bill_no');
			$table->dateTime('order_dt')->nullable();
			$table->dateTime('order_dt')
			->default('0000-00-00 00:00:00')->index('idx_order_dt')->comment('付費時間, 對應 transaction.user_purchases.paid_ts')->change();
			$table->bigInteger('ordertotal')->default(0)->index('idx_ordertotal')->comment('實際付款金額(不包含折扣,點數,運費)');
			$table->string('store_name_alias', 128)->nullable()->comment('gomaji.products.store_name_alias 店家別名');
			$table->string('product_type', 10)->nullable()->comment('商品類型 3c/normal');
			$table->string('category_name', 45)->nullable()->comment('類別名稱');
			$table->dateTime('feetime')->nullable();
			$table->dateTime('feetime')
			->default('0000-00-00 00:00:00')->index('idx_feetime')->comment('銷售認列時間(所有 coupon 都需核銷並抓最後一個序號核銷的時間)')->change();
			$table->dateTime('feetimetoline')->nullable();
			$table->dateTime('feetimetoline')
			->default('0000-00-00 00:00:00')->comment('對帳認列時間(拋給Line)')->change();
			$table->string('ecid')->default('')->index('idx_ecid')->comment('line用戶識別碼');
			$table->dateTime('first_postback_dt')->nullable();
			$table->dateTime('first_postback_dt')
			->default('0000-00-00 00:00:00')->index('idx_first_postback_dt')->comment('首次回拋時間')->change();
			$table->char('first_postback_hash', 64)->default('')->comment('首次回拋驗證碼');
			$table->boolean('first_postback_status')->default(0)->index('idx_first_postback_status')->comment('首次回拋狀態 0 = 尚未回拋, 1 = 回拋成功, 2 = 回拋失敗, 3 = 異常訂單 ( 詳情請參考 first_postback_result )');
			$table->string('first_postback_result')->nullable()->comment('首次回拋結果');
			$table->dateTime('deposit_postback_dt')->nullable();
			$table->dateTime('deposit_postback_dt')
			->default('0000-00-00 00:00:00')->index('idx_deposit_postback_dt')->comment('請款回拋時間')->change();
			$table->char('deposit_postback_hash', 64)->default('')->comment('請款回拋驗證碼');
			$table->boolean('deposit_postback_status')->default(0)->index('idx_deposit_postback_status')->comment('請款回拋狀態 0 = 尚未回拋, 1 = 回拋成功, 2 = 回拋失敗, 3 = 異常訂單 ( 詳情請參考 deposit_postback_result )');
			$table->string('deposit_postback_result')->nullable()->comment('請款回拋結果');
			$table->unique(['purchase_id','bill_no'], 'idx_purchase_id_bill_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('line_shopping_postback');
	}

}

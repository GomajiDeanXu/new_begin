<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatRefundTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('plat_refund', function(Blueprint $table)
		{
			$table->increments('pr_id')->comment('系統流水號');
			$table->integer('qid')->default(0)->index('idx_qid')->comment('deal_queue.qid');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號，對照 gomaji.plat_info');
			$table->string('plat_order_id', 50)->nullable()->default('')->index('idx_plat_order_id')->comment('平台訂單編號');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id')->comment('user_purchases.purchase_id');
			$table->integer('refund_money')->default(0)->comment('退費金額');
			$table->integer('date_finish')->default(0)->comment('退費完成日');
			$table->boolean('coupon_status')->default(0)->index('idx_coupon_status')->comment('0: 未處理, 1:已處理');
			$table->integer('refund_type')->default(1)->index('idx_refund_type')->comment('退費方式');
			$table->timestamp('create_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('建立時間');
			$table->timestamp('modify_time')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'))->comment('異動時間');
			$table->dateTime('delete_time')->nullable()->comment('刪除時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('plat_refund');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponQueueTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_queue', function(Blueprint $table)
		{
			$table->integer('cqid', true);
			$table->integer('qid')->default(0)->index('idx_qid')->comment('deal_queue.qid');
			$table->integer('purchase_id')->default(0)->index('idx_purchase_id');
			$table->char('auth_code', 5)->default('')->index('idx_auth_code')->comment('COPON 驗證碼(產品下檔後批次產生)');
			$table->char('auth_serial', 5)->default('')->index('idx_auth_serial')->comment('流水號(coupon 號碼)(產品下檔後批次產生)');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0 : 無效(不可使用)
1 : 有效(可使用)');
			$table->integer('create_ts')->default(0);
			$table->index(['auth_code','auth_serial'], 'idx_coupon_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('coupon_queue');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCouponMcdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('coupon_mcd', function(Blueprint $table)
		{
			$table->integer('purchase_id')->default(0)->index('idx_purchase_id');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('instant_id')->default(0)->index('idx_instant_id');
			$table->integer('sp_id')->default(0)->index('idx_sp_id');
			$table->char('auth_code', 5)->default('')->index('idx_auth_code')->comment('COPON 驗證碼(產品下檔後批次產生)');
			$table->char('auth_serial', 5)->default('')->index('idx_auth_serial')->comment('流水號(coupon 號碼)(產品下檔後批次產生)');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0 : 無效(不可使用)
1 : 有效(可使用)
2 : 已使用');
			$table->string('status', 10)->default('')->index('idx_status');
			$table->boolean('trust_flag')->default(0);
			$table->integer('use_ts')->default(0)->comment('coupon 被使用的時間');
			$table->integer('coupon_id', true);
			$table->integer('amount')->default(0);
			$table->integer('bonus')->default(0);
			$table->integer('pcode')->default(0);
			$table->integer('discount')->default(0);
			$table->integer('led')->default(0)->index('idx_led');
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
		Schema::connection('transaction')->drop('coupon_mcd');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('inv_info', function(Blueprint $table)
		{
			$table->integer('inv_id', true);
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->boolean('act_type')->default(1)->index('idx_act_type');
			$table->integer('inv_amount')->default(0);
			$table->integer('inv_quantity')->default(0);
			$table->boolean('inv_status')->default(0)->index('idx_inv_status');
			$table->char('inv_no', 10)->default('')->index('idx_inv_no');
			$table->char('inv_flag', 1)->default('')->index('idx_inv_flag');
			$table->integer('date_inv')->default(0)->index('idx_date_inv')->comment('開立日期');
			$table->integer('date_create')->default(0)->index('idx_date_create');
			$table->integer('date_update')->default(0);
			$table->string('full_name', 45)->default('');
			$table->string('mobile_phone', 45)->default('');
			$table->string('email', 45)->default('');
			$table->char('com_no', 8)->default('');
			$table->string('title', 45)->default('');
			$table->string('zip', 5)->default('');
			$table->string('address')->default('');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->integer('date_minus')->default(0);
			$table->integer('minus_amount')->default(0);
			$table->integer('minus_quantity')->default(0);
			$table->string('memo')->nullable();
			$table->integer('apply_ts')->default(0)->index('idx_apply_ts');
			$table->boolean('apply_type')->default(0)->index('idx_apply_type');
			$table->boolean('apply_from')->default(0)->index('idx_apply_from');
			$table->boolean('carrier_type')->default(0)->index('idx_carrier_type')->comment('0: 無
1: 手機條碼
2: 自然人憑證
3: 愛心碼
11: 會員載具');
			$table->string('carrier_id', 64)->default('')->comment('載具號碼');
			$table->boolean('inv_type')->default(0)->comment('0:舊制 1: 個人戶 2: 公司戶');
			$table->string('inv_memo')->nullable()->default('')->comment('開立發票備註欄');
			$table->integer('date_modify')->default(0)->comment('修改買受人資訊時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('inv_info');
	}

}

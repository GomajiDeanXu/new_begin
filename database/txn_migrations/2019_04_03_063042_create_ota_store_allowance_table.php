<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOtaStoreAllowanceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('ota_store_allowance', function(Blueprint $table)
		{
			$table->integer('sa_id', true)->comment('折讓單ID');
			$table->integer('si_id')->default(0)->index('idx_si_id')->comment('發票ID');
			$table->integer('sf_id')->default(0)->index('idx_sf_id')->comment('店家請款ID');
			$table->integer('store_id')->default(0)->index('idx_store_id')->comment('店家ID');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('分店 ID (對應 gomaji.store_branch_total.branch_id');
			$table->integer('flag')->default(1)->index('idx_flag')->comment('狀態(-1:刪除1:正常)');
			$table->string('inv_no', 45)->index('idx_inv_no')->comment('發票號碼');
			$table->integer('inv_amount')->default(0)->comment('發票金額');
			$table->integer('inv_ts')->default(0)->index('idx_inv_ts')->comment('收到發票日期');
			$table->string('alo_no', 45)->index('idx_alo_no')->comment('折讓單號碼');
			$table->integer('alo_payment')->default(0)->comment('折讓單金額(未稅)');
			$table->integer('alo_tax')->default(0)->comment('折讓單稅額');
			$table->integer('alo_amount')->default(0)->comment('折讓單金額(含稅)');
			$table->integer('alo_ts')->default(0)->index('idx_alo_ts')->comment('折讓單開立日期');
			$table->string('tax_type', 5)->default('P04')->index('idx_tax_type')->comment('稅別碼');
			$table->string('backend_acc', 45)->index('idx_backend_acc')->comment('建立者帳號');
			$table->string('memo')->nullable()->comment('備註');
			$table->string('sa_type', 5)->default('')->index('sa_type');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('ota_store_allowance');
	}

}

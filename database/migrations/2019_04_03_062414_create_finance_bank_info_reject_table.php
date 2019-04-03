<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinanceBankInfoRejectTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('finance_bank_info_reject', function(Blueprint $table)
		{
			$table->integer('fb_id', true);
			$table->integer('reject_id')->default(0)->index('idx_reject_id')->comment('reject.detail.reject_id');
			$table->text('reject_desc', 65535)->comment('退件原因備註');
			$table->integer('creator_user_id')->default(0)->comment('取號或退件操作人的backend帳號id');
			$table->integer('create_ts')->default(0);
			$table->boolean('flag')->default(1)->comment('0: 刪除
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('finance_bank_info_reject');
	}

}

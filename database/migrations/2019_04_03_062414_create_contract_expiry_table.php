<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContractExpiryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contract_expiry', function(Blueprint $table)
		{
			$table->integer('auto_id', true);
			$table->integer('store_contact_id')->default(0)->index('idx_store_contact_id')->comment('對應store_contact的ID');
			$table->integer('create_ts')->default(0)->comment('新增時間');
			$table->integer('contract_ts')->default(0)->comment('要通知的月份');
			$table->string('backend_acc', 64)->default('')->comment('設定的backend後台帳號');
			$table->integer('email_ts')->default(0)->comment('發送時間');
			$table->boolean('flag')->default(0)->index('idx_flag')->comment('(0: 未發送 / 1: 已發送)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contract_expiry');
	}

}

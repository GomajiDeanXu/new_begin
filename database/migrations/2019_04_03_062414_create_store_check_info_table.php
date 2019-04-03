<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreCheckInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_check_info', function(Blueprint $table)
		{
			$table->integer('sci_id', true);
			$table->integer('store_contact_id')->default(0)->index('idx_store_contact_id')->comment('gomaji.store_contact.store_contact_id');
			$table->integer('group_id')->default(0)->comment('gomaji.store_branch_total.branch_id');
			$table->integer('check_ts')->default(0)->comment('查核日期');
			$table->integer('create_ts')->default(0)->comment('輸入時間');
			$table->string('user_name', 64)->default('')->comment('輸入人員');
			$table->string('memo')->default('')->comment('備註');
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
		Schema::drop('store_check_info');
	}

}

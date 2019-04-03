<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreBranchInfoTmpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_branch_info_tmp', function(Blueprint $table)
		{
			$table->increments('tmp_branch_id');
			$table->integer('rts_id')->default(0)->comment('reporter_to_store.rts_id');
			$table->integer('group_id')->comment('store_branch_total.branch_id');
			$table->integer('max_order_no')->default(0)->comment('該分店的團購上限數');
			$table->string('list_phone', 45)->nullable()->comment('清冊連絡電話');
			$table->string('list_address', 45)->nullable()->comment('清冊寄送地址');
			$table->boolean('list_flag')->default(1)->comment('統一寄送清冊(若非統一寄送，所有分店皆為 1；統一寄送只有第一間分店為 1，其餘為 2)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_branch_info_tmp');
	}

}

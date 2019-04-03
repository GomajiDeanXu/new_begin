<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsBankInfoChangeLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_bank_info_change_log', function(Blueprint $table)
		{
			$table->integer('pb_id', true);
			$table->integer('store_contact_id')->default(0)->index('idx_store_contact_id');
			$table->integer('product_id')->default(0);
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('channel')->default(0);
			$table->string('bank_code', 11)->default('');
			$table->string('bank_branch_code', 11)->default('');
			$table->string('bank_account_name', 64)->default('');
			$table->string('bank_account', 20)->nullable()->default('');
			$table->string('com_no', 10)->default('');
			$table->boolean('bank_flag')->default(0)->comment('是否需要審核');
			$table->boolean('first')->default(0)->comment('己有被審核過');
			$table->integer('modify_user_id')->default(0);
			$table->string('modify_user_name', 45)->default('');
			$table->integer('create_ts')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_bank_info_change_log');
	}

}

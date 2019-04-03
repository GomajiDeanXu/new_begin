<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsBankInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products_bank_info', function(Blueprint $table)
		{
			$table->integer('bank_info_id', true)->comment('        ');
			$table->integer('product_id')->default(0)->index('idx_product_id');
			$table->string('store_id', 45)->default('0')->index('idx_store_id');
			$table->integer('branch_id')->default(0)->index('idx_branch_id');
			$table->integer('group_id')->default(0)->index('idx_group_id');
			$table->string('bank_code', 11)->default('');
			$table->string('bank_branch_code', 11)->default('');
			$table->string('bank_account_name', 64)->default('');
			$table->string('bank_account', 20)->default('');
			$table->string('com_no', 45)->default('')->comment('統編');
			$table->integer('create_ts')->default(0);
			$table->integer('confirm_time')->default(0)->comment('審核時間');
			$table->boolean('type')->default(0)->comment('是否為分店分帳');
			$table->boolean('flag')->default(1)->comment('資料狀態');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products_bank_info');
	}

}

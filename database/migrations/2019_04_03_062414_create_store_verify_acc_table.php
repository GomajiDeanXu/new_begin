<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreVerifyAccTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_verify_acc', function(Blueprint $table)
		{
			$table->increments('auto_id');
			$table->integer('product_id');
			$table->integer('branch_id');
			$table->integer('group_id')->default(0)->index('idx_group_id');
			$table->string('account', 10)->index('idx_account');
			$table->string('password', 10)->index('idx_password');
			$table->string('verify_url');
			$table->boolean('flag')->default(1)->index('idx_flag');
			$table->integer('create_ts')->unsigned()->index('idx_create_ts');
			$table->boolean('mypad')->default(0);
			$table->string('mid', 20)->default('');
			$table->boolean('checked')->default(0)->index('idx_checked');
			$table->integer('checked_ts')->unsigned()->default(0);
			$table->string('app_version', 13)->nullable()->comment('店家 Pad 安裝的後台系統版本');
			$table->integer('last_login_ts')->unsigned()->default(0)->comment('後台系統最後一次來檢查版本的時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('store_verify_acc');
	}

}

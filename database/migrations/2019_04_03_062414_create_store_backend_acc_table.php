<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStoreBackendAccTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('store_backend_acc', function(Blueprint $table)
		{
			$table->integer('sba_id', true);
			$table->integer('store_id')->default(0)->index('idx_store_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('0: 總店
不等於0時為各分店的group_id
');
			$table->string('account', 16)->default('')->index('idx_account');
			$table->string('password', 16)->default('')->index('idx_password');
			$table->boolean('store_type')->default(1)->index('idx_store_type')->comment('0: 總店
1: 分店
');
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
		Schema::drop('store_backend_acc');
	}

}

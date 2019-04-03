<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlacklistTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('blacklist', function(Blueprint $table)
		{
			$table->integer('blid', true)->comment('黑名單ID');
			$table->string('create_nick', 45)->default('')->comment('設定人員');
			$table->integer('create_ts')->default(0)->index('idx_create_ts')->comment('設定時間');
			$table->string('cancel_nick', 45)->default('')->comment('刪除人員');
			$table->integer('cancel_ts')->default(0)->index('idx_cancel_ts')->comment('刪除時間');
			$table->integer('type')->default(1)->index('idx_type')->comment('黑名單類型[1]：email [2]：mobile_phone');
			$table->string('black_val', 45)->default('')->index('idx_black_val')->comment('黑名單資料');
			$table->integer('flag')->default(1)->index('idx_flag')->comment('[1]：有效[0]：刪除');
			$table->string('reason')->default('')->comment('被列入黑名單的理由');
			$table->boolean('source')->default(1)->comment('1為團購 2為BB');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('blacklist');
	}

}

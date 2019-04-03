<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRefCodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ref_code', function(Blueprint $table)
		{
			$table->integer('ref_id', true);
			$table->string('ref_code', 45)->default('')->index('idx_ref_code')->comment('ref碼');
			$table->integer('cookie_expiry_time')->default(1)->comment('cookie存活時間
單位: 小時');
			$table->string('full_name', 128)->default('');
			$table->string('email', 128)->default('');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->integer('update_ts')->default(0)->comment('更新時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0: 停用
1: 正常');
			$table->string('nick', 32)->nullable()->comment('修改者');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ref_code');
	}

}

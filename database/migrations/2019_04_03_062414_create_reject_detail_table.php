<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRejectDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reject_detail', function(Blueprint $table)
		{
			$table->integer('reject_id', true);
			$table->integer('rc_id')->default(0)->index('idx_rc_id')->comment('reject_category.rc_id
');
			$table->string('bu', 32)->default('');
			$table->string('reject_reason', 128)->default('');
			$table->string('flag', 45)->default('1')->comment('0: 刪除\n1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reject_detail');
	}

}

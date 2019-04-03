<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEdenredWorkkeyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('edenred_workkey', function(Blueprint $table)
		{
			$table->integer('wk_id', true)->comment('id');
			$table->string('workkey', 40)->default('')->comment('宜睿加密用workkey');
			$table->integer('can_use_ts')->default(0)->index('idx_can_use_ts')->comment('可使用的時間');
			$table->integer('create_ts')->default(0)->comment('產生時間');
			$table->boolean('flag')->default(1)->comment('兌換卷狀態，比照transaction.coupon.flag');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('edenred_workkey');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserVerifyflagLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_verifyflag_log', function(Blueprint $table)
		{
			$table->integer('verifyflag_id', true);
			$table->bigInteger('gm_uid')->default(0)->index('idx_gm_uid')->comment('會員編號');
			$table->integer('bonus_id')->default(0)->comment('團購金退現的bonus_id');
			$table->bigInteger('bill_no')->default(0)->index('idx_bill_no')->comment('訂單編號');
			$table->integer('verify_point')->default(0)->comment('核銷標記：記錄金額');
			$table->integer('create_ts')->default(0)->index('idx_got_ts')->comment('轉出、入時間');
			$table->boolean('flag')->default(1)->comment('標記 [ 0:刪除 / 1:有效]');
			$table->integer('coupon_id')->default(0)->comment('團購金退現的bonus_id');
			$table->integer('use_ts')->default(0)->index('idx_use_ts')->comment('核銷日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_verifyflag_log');
	}

}

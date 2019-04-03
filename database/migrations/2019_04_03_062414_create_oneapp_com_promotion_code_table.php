<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappComPromotionCodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_com_promotion_code', function(Blueprint $table)
		{
			$table->increments('cpc_id')->comment('系統流水號');
			$table->string('promotion_code', 10)->default('')->index('idx_promotion_code')->comment('優惠碼');
			$table->integer('start_ts')->default(0)->index('idx_start_date')->comment('起始日期');
			$table->integer('end_ts')->default(0)->index('idx_end_date')->comment('結束日期');
			$table->integer('points')->default(0)->comment('點數');
			$table->integer('expirty_day')->default(0)->comment('效期天數 (例如 30)');
			$table->boolean('exclusive_tag')->default(0)->comment('是否與MGM、店推互斥 (1=互斥，2=不互斥)');
			$table->boolean('number_tag')->default(1)->comment('份數開關 (1=沒限制，2=有限制)');
			$table->integer('number')->default(0)->comment('份數');
			$table->integer('used_number')->default(0)->comment('已發份數');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態 (1=有效，0=無效)');
			$table->integer('create_ts')->default(0)->comment('建立時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_com_promotion_code');
	}

}

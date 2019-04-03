<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrgPriceControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('org_price_control', function(Blueprint $table)
		{
			$table->integer('org_id', true);
			$table->integer('start_ts')->default(0)->index('idx_start_ts')->comment('開始時間');
			$table->integer('end_ts')->default(0)->index('idx_end_ts')->comment('結束時間');
			$table->float('ratio', 6, 4)->default(0.0000);
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
		Schema::drop('org_price_control');
	}

}

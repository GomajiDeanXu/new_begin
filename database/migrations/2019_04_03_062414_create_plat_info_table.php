<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlatInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('plat_info', function(Blueprint $table)
		{
			$table->increments('pi_id')->comment('系統流水號');
			$table->boolean('plat')->index('idx_plat')->comment('平台編號');
			$table->string('plat_key', 50)->nullable()->default('')->index('idx_plat_key')->comment('平台key name');
			$table->string('plat_name', 50)->nullable()->default('')->comment('平台名稱');
			$table->float('commission_fee_rate', 12, 4)->default(0.0000)->comment('交易手續費比例');
			$table->float('card_fee_rate', 12, 4)->default(0.0000)->comment('信用卡手續費比例');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('plat_info');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcodeGm5Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('pcode_gm5', function(Blueprint $table)
		{
			$table->integer('pcode_id', true)->comment('promotion code');
			$table->integer('main_id')->default(0)->index('idx_main_id')->comment('pcode_main.main_id');
			$table->char('pin', 6)->default('')->index('idx_pin')->comment('六碼英數字(大寫英文排除I,0，數字排除1,0)');
			$table->char('mobile_phone', 10)->default('')->index('idx_mobile_phone')->comment('取得 pin 碼之手機門號');
			$table->integer('date_get')->default(0)->index('idx_date_get');
			$table->integer('date_valid')->default(0)->index('idx_date_valid')->comment('開卡日期');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->string('refer', 32)->default('');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('pcode_gm5');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcodePpeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('pcode_ppe', function(Blueprint $table)
		{
			$table->integer('pcode_id', true)->comment('promotion code');
			$table->integer('main_id')->default(0)->index('idx_main_id')->comment('pcode_main.main_id');
			$table->char('pin', 6)->default('')->index('idx_pin')->comment('六碼英數字(大寫英文排除I,0，數字排除1,0)');
			$table->bigInteger('gm_uid')->default(0)->comment('user.gm_uid');
			$table->char('mobile_phone', 10)->default('')->index('idx_mobile_phone')->comment('取得 pin 碼之手機門號');
			$table->string('email', 45)->default('')->index('idx_email')->comment('取得 pin 碼之email');
			$table->integer('date_get')->default(0)->index('idx_date_get');
			$table->integer('date_expiry')->default(0)->index('idx_date_expiry')->comment('序號到期時間');
			$table->integer('date_valid')->default(0)->index('idx_date_valid')->comment('開卡日期');
			$table->bigInteger('purchase_id')->default(0)->index('idx_purchase_id');
			$table->boolean('flag')->default(0)->index('idx_flag');
			$table->string('refer', 32)->default('');
			// $table->primary(['gm_uid','date_get','pcode_id']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('pcode_ppe');
	}

}

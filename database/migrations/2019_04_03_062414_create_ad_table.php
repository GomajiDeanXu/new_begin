<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ad', function(Blueprint $table)
		{
			$table->increments('ad_id')->comment('廣告ID');
			$table->integer('client_id')->unsigned()->default(0)->index('idx_client_id')->comment('廣告客戶ID');
			$table->integer('ad_start_ts')->default(0)->comment('廣告日期(開始)');
			$table->integer('ad_end_ts')->default(0)->comment('廣告日期(結束)');
			$table->string('ad_title', 120)->default('')->comment('廣告標題');
			$table->string('ad_type')->default('')->comment('廣告版位');
			$table->integer('charge_amount')->default(0)->comment('總金額');
			$table->text('charge_type', 65535)->nullable()->comment('收費方式');
			$table->integer('charge_ts')->default(0)->comment('預估付款日');
			$table->text('comment', 65535)->nullable()->comment('備註');
			$table->integer('invoice_ts')->default(0)->comment('預估發票開立日期');
			$table->string('commission_file')->default('')->comment('委刊單檔案');
			$table->integer('create_ts')->default(0)->comment('建立時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('(0: 刪除 / 1: 正常)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ad');
	}

}

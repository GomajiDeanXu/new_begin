<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrustVerifyDoneTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('trust_verify_done', function(Blueprint $table)
		{
			$table->integer('tvd_id', true)->comment('信託完成核銷記錄ID');
			$table->integer('product_id')->default(0)->index('product_id')->comment('商品ID');
			$table->integer('create_ts')->default(0)->index('create_ts')->comment('建立時間');
			$table->integer('type')->default(1)->index('type')->comment('資料類型(1:SH收付款資料2:LB收付款資料3:ES_GA收付款資料4:ES_HA付款資料5:ES_HA請款資料6:ID收付款資料)');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('trust_verify_done');
	}

}

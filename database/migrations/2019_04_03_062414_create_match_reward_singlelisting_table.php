<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchRewardSinglelistingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_reward_singlelisting', function(Blueprint $table)
		{
			$table->increments('mrs_id')->comment('系統流水號');
			$table->integer('re_id')->default(0)->index('idx_re_id')->comment('oneapp_reward_events.re_id');
			$table->boolean('event_type')->comment('活動類別 (5=團購活動累點，7=買單優惠)');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->float('event_point_percent', 5, 4)->default(0.0000)->comment('贈點-指定百分比');
			$table->integer('event_feedback_points')->default(0)->comment('贈點-指定固定點數');
			$table->boolean('flag')->default(1)->comment('狀態（1=有效，0=無效）');
			$table->integer('create_ts')->default(0)->comment('建立日期時間');
			$table->string('label1', 30)->default('')->comment('前端商品標題一 eg.贈點');
			$table->string('label2', 30)->default('')->comment('前端商品標題二 eg.消費贈點');
			$table->string('label3', 30)->default('')->comment('前端商品標題三 eg.今天買贈點');
			$table->integer('sourcetype')->nullable()->comment('1=event活動,2=買單拆分贈點');
			$table->boolean('display')->nullable()->default(1)->comment('1=前端要呈現贈點字樣,0=前端不呈現贈點字樣');
			$table->boolean('combine')->nullable()->default(0)->comment('0=不可合併,1=可以合併(加碼活動)');
			$table->boolean('repeatedly_point_tag')->default(0)->comment('不再使用');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_reward_singlelisting');
	}

}

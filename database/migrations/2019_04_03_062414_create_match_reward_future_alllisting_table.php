<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMatchRewardFutureAlllistingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('match_reward_future_alllisting', function(Blueprint $table)
		{
			$table->increments('mra_id')->comment('系統流水號');
			$table->boolean('event_type')->comment('活動類別 (5=團購活動累點，7=買單優惠)');
			$table->integer('re_id')->default(0)->index('idx_re_id')->comment('oneapp_reward_events.re_id');
			$table->integer('product_id')->default(0)->index('idx_product_id')->comment('products.product_id');
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('store_branch_total.branch_id');
			$table->decimal('event_point_percent', 5, 4)->default(0.0000)->comment('贈點-指定百分比');
			$table->integer('event_feedback_points')->default(0)->comment('贈點-指定固定點數');
			$table->boolean('flag')->default(1)->comment('狀態（1=有效，0=無效）');
			$table->integer('create_ts')->default(0)->comment('建立日期時間');
			$table->boolean('repeatedly_point_tag')->default(0)->comment('1=當月限領一次 2=同一gid/pid限領一次');
			$table->integer('sourcetype')->nullable()->comment('1=event活動,2=買單拆分贈點');
			$table->boolean('display')->nullable()->default(1)->comment('1=前端要呈現贈點字樣,0=前端不呈現贈點字樣');
			$table->boolean('combine')->nullable()->default(0)->comment('0=不可合併,1=可以合併(加碼活動)');
			$table->smallInteger('wording_id')->nullable()->default(1)->comment('活動要套用的字樣。refer to wording_template.wording_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('match_reward_future_alllisting');
	}

}

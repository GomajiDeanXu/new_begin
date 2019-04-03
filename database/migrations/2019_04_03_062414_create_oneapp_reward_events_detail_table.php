<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappRewardEventsDetailTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_reward_events_detail', function(Blueprint $table)
		{
			$table->increments('red_id')->comment('系統流水號');
			$table->integer('re_id')->default(0)->index('idx_re_id')->comment('oneapp_reward_events_rule.re_id(2018/3/1起已不使用，改用rem_id）');
			$table->integer('filter_id')->default(0)->index('idx_filter_id')->comment('對應的欄位需搭配filterid_type');
			$table->integer('type')->default(0)->comment('1:include filter_id，2:exclude filter_id');
			$table->boolean('flag')->default(1)->comment('狀態（1=有效，0=無效）');
			$table->integer('create_ts')->default(0)->comment('建立日期時間');
			$table->integer('create_user')->default(0)->comment('建立人員');
			$table->integer('modify_ts')->default(0)->comment('修改日期時間');
			$table->integer('modify_user')->default(0)->comment('修改人員');
			$table->boolean('filterid_type')->nullable()->default(3)->comment('1: filter_id=sid,2:filter_id=gid,3:filter_id=pid');
			$table->integer('rem_id')->nullable()->default(0)->comment('oneapp_reward_events_main.rem_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_reward_events_detail');
	}

}

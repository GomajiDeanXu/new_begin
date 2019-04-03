<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappRejectPointsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_reject_points', function(Blueprint $table)
		{
			$table->increments('rp_id')->comment('系統流水號');
			$table->boolean('event_type')->comment('參考flag_mapping , column_name=event_type');
			$table->string('re_id', 50)->default('0')->comment('oneapp_reward_events_rule.re_id');
			$table->integer('purchase_id')->default(0)->index('idx_purchase_id')->comment('團購交易序號');
			$table->string('reject_rule', 200)->default('')->comment('贈點資格不通過的條件');
			$table->string('reject_rule_value', 200)->default('')->comment('贈點資格不通過的條件值');
			$table->string('input_value', 200)->default('')->comment('交易傳入值');
			$table->dateTime('create_ts')->comment('建立日期時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_reject_points');
	}

}

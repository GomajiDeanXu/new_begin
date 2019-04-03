<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappRewardEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_reward_events', function(Blueprint $table)
		{
			$table->increments('re_id')->comment('系統流水號');
			$table->boolean('event_type')->index('idx_event_type')->comment('活動類別 (1=MGM，2=首購促銷...)');
			$table->integer('start_ts')->unsigned()->default(0)->index('idx_start_ts')->comment('活動起始日期時間');
			$table->integer('end_ts')->unsigned()->default(0)->index('idx_end_ts')->comment('活動結束日期時間');
			$table->string('event_title', 20)->default('')->comment('活動標題名稱');
			$table->integer('event_point_lowest')->default(0)->comment('點數下限');
			$table->integer('event_point_highest')->default(0)->comment('點數上限');
			$table->float('event_point_percent', 5, 4)->default(0.0000)->comment('贈點-指定百分比');
			$table->integer('event_feedback_points')->default(0)->comment('贈點-指定固定點數');
			$table->integer('event_point_expiry')->default(0)->comment('指定點數效期');
			$table->integer('event_point_expiry_days')->default(0)->comment('指定點數效期天數');
			$table->integer('trans_amount_limit')->default(0)->comment('交易金額滿多少才贈點');
			$table->integer('create_ts')->unsigned()->default(0)->comment('建立日期時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態（1=有效，2=無效）');
			$table->integer('modify_ts')->default(0)->comment('修改日期時間');
			$table->string('tag_id', 40)->nullable()->default('')->comment('買單：店家tag，團購：product的tag_id 或category_id');
			$table->string('ch_id_tag', 40)->nullable()->default('')->comment('頻道（channel_map.channel)');
			$table->boolean('return_point_tag')->default(1)->comment('是否可返回點數(1=可，0=不可)');
			$table->integer('bflag')->default(0)->index('idx_bflag')->comment('（bitwise）1=排除分次分異 2=可與其他活動合併得點 4=限指定PID∕GID 8=全數核銷 16=今天上架今天買(其他參考flag_mapping)');
			$table->string('card_bank', 10)->default('')->index('idx_card_bank')->comment('信用卡發卡銀行（例如 tscard）');
			$table->string('push_content', 60)->nullable()->default('')->comment('推播訊息');
			$table->boolean('repeatedly_point_tag')->default(0)->comment('0=限首單贈點 1=當月限領一次 2=同一gid/pid限領一次');
			$table->integer('repeatedly_point_bflag')->default(0)->comment('如果可重複贈點(repeatedly_point_tag>0)，搭配的條件限制（1=當月限領一次）');
			$table->integer('event_number')->nullable()->comment('限制份數');
			$table->boolean('get_points_first_flag')->nullable()->default(0)->index('idx_get_points_first_flag')->comment('是否先贈點 (0=兌換券全收核銷後給點，1=交易成單給點，2=單張兌換券核銷後給點)');
			$table->float('exclude_ratio', 11, 4)->nullable()->default(0.0000)->comment('排除的拆分比例');
			$table->string('exclude_ch', 40)->nullable()->default('')->comment('排除頻道（channel_map.channel)');
			$table->string('exclude_tag_ids', 40)->nullable()->default('')->comment('需排除的類型（買單：店家tag，團購：product的tag_id 或category_id），如這個有值，那exclude_ch也必須有值');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_reward_events');
	}

}

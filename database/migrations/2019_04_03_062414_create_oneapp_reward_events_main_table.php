<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappRewardEventsMainTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_reward_events_main', function(Blueprint $table)
		{
			$table->increments('rem_id')->comment('系統流水號');
			$table->boolean('event_type')->index('idx_event_type')->comment('活動類別 (1=MGM，2=首購促銷...)');
			$table->dateTime('start_ts')->index('idx_start_ts')->comment('活動起始日期時間');
			$table->dateTime('end_ts')->index('idx_end_ts')->comment('活動結束日期時間');
			$table->string('event_title', 20)->default('')->comment('活動標題名稱');
			$table->integer('event_point_lowest')->default(0)->comment('點數下限');
			$table->integer('event_point_highest')->default(0)->comment('點數上限');
			$table->float('event_point_percent', 5, 4)->default(0.0000)->comment('贈點-指定百分比');
			$table->integer('event_feedback_points')->default(0)->comment('贈點-指定固定點數');
			$table->dateTime('event_point_expiry')->default('0000-00-00 00:00:00')->comment('指定點數效期');
			$table->boolean('event_point_expiry_days')->comment('指定點數效期天數');
			$table->integer('trans_amount_limit')->default(0)->comment('交易金額滿多少才贈點');
			$table->integer('cash_amount_limit')->nullable()->default(0)->comment('現金或刷卡的贈點門檻');
			$table->integer('event_number')->nullable()->default(-1)->comment('限制份數');
			$table->dateTime('create_ts')->comment('建立日期時間');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('狀態（1=有效，2=無效）');
			$table->dateTime('modify_ts')->comment('修改日期時間');
			$table->string('ch_id', 40)->nullable()->default('')->comment('頻道（channel_map.channel)');
			$table->string('tag_id', 40)->nullable()->default('')->comment('買單：店家tag，團購：product的tag_id');
			$table->string('category_id', 40)->nullable()->default('')->comment('團購：product的category_id');
			$table->integer('bflag')->default(0)->index('idx_bflag')->comment('(bitwise)，交易記錄需完全吻合(參考flag_mapping)');
			$table->string('card_bank', 60)->default('')->index('idx_card_bank')->comment('信用卡發卡銀行（例如 tscard）');
			$table->string('pickup', 60)->nullable()->default('0')->comment('(bitwise)，超取店家符合一項即可(參考flag_mapping)');
			$table->string('push_content', 60)->nullable()->default('')->comment('推播訊息');
			$table->string('namelist_flag', 1)->nullable()->default('N')->comment('N=沒有黑白名單，W=白名單，B=黑名單');
			$table->string('namelist', 100)->nullable()->default('')->comment('黑白名單清單，gm_uid或Redis Key');
			$table->boolean('get_points_first_flag')->nullable()->default(0)->index('idx_get_points_first_flag')->comment('是否先贈點 (0=兌換券全收核銷後給點，1=交易成單給點，2=單張兌換券核銷後給點)');
			$table->boolean('combine')->default(0)->comment('0=不可合併,1=可以合併(加碼活動)');
			$table->boolean('display')->default(1)->comment('1=前端要呈現贈點字樣,0=前端不呈現贈點字樣');
			$table->smallInteger('wording_id')->nullable()->default(1)->comment('活動要套用的字樣。refer to wording_template.wording_id');
			$table->boolean('refundrecovery')->default(0)->comment('0=退費後不可取消贈點資格,1=退費後可以取消贈點資格');
			$table->boolean('repeated')->default(0)->comment('0=每筆都贈點1=限制起迄日內贈一次 2=限制起迄日ob BySID/GID/PID贈一次');
			$table->string('frequency', 30)->default('* *')->comment('哪一天及星期幾可重覆贈點,1=星期一, 7=星期日');
			$table->float('exclude_ratio', 11, 4)->nullable()->default(0.0000)->comment('排除的拆分比例');
			$table->integer('exclude_bflag')->default(0)->comment('（bitwise）皆為排除條件，參考flag_mapping');
			$table->string('exclude_pickup', 60)->nullable()->default('0')->comment('(bitwise)，超取店家符合一項即可(參考flag_mapping)');
			$table->string('exclude_ch_id', 40)->nullable()->default('')->comment('排除條件:頻道（channel_map.channel)');
			$table->string('exclude_tag_id', 40)->nullable()->default('')->comment('排除條件:買單-店家tag，團購-product的tag_id');
			$table->string('exclude_category_id', 40)->nullable()->default('')->comment('排除條件:團購:product的category_id');
			$table->boolean('return_point_tag')->nullable()->default(1)->comment('1是否可返回點數(1=可，0=不可)');
			$table->boolean('plat')->default(0)->comment('平台來源(pc，mweb，app)，預設0為不限制');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_reward_events_main');
	}

}

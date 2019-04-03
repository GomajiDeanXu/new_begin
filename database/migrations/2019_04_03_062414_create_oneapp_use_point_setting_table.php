<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOneappUsePointSettingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('oneapp_use_point_setting', function(Blueprint $table)
		{
			$table->increments('ups_id')->comment('系統流水號');
			$table->boolean('ch_id')->default(0)->index('idx_ch_id')->comment('頻道');
			$table->integer('start_ts')->default(0)->index('idx_start_ts')->comment('起始日期時間');
			$table->integer('end_ts')->default(0)->index('idx_end_ts')->comment('結束日期時間');
			$table->float('use_percent', 4, 4)->default(0.0000)->comment('耗點-指定百分比');
			$table->integer('use_points')->default(0)->comment('耗點-指定固定點數');
			$table->string('tag_id', 100)->default('')->comment('店家tag');
			$table->string('group_id_str', 200)->default('')->comment('指定商店gid');
			$table->string('pid_str', 200)->default('')->comment('指定pid');
			$table->boolean('status')->default(1)->index('idx_status')->comment('狀態 (1=正常，2=關閉)');
			$table->integer('create_ts')->default(0)->comment('建立日期時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('oneapp_use_point_setting');
	}

}

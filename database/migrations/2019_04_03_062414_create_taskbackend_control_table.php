<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskbackendControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taskbackend_control', function(Blueprint $table)
		{
			$table->integer('id', true)->comment('auto_id');
			$table->string('taskname', 50)->comment('排程名稱');
			$table->integer('execute_status')->default(0)->index('idx_execute_status')->comment('執行狀態 0 = 永不執行, 1 = 由 UI 設定執行, 2 = 排程自動執行');
			$table->integer('execute_start_ts')->default(0)->comment('排程起始時間');
			$table->integer('execute_end_ts')->default(0)->comment('排程結束時間');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('taskbackend_control');
	}

}

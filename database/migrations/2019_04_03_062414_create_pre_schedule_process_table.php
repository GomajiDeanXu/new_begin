<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePreScheduleProcessTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pre_schedule_process', function(Blueprint $table)
		{
			$table->integer('process_id', true);
			$table->integer('pre_schedule_id')->default(0)->index('idx_pre_schedule_id')->comment('product_pre_schedule.pre_schedule_id
');
			$table->boolean('schedule_type')->default(0)->comment('1: 團購
2: 4300');
			$table->boolean('process_type')->default(0)->index('idx_process_type')->comment('0: 取號
1: 退件');
			$table->string('reject_ids', 32)->default('')->index('idx_reject_id')->comment('gomaji.reject_detail.reject_id');
			$table->text('reject_desc', 65535);
			$table->integer('creator_user_id')->default(0)->comment('取號或退件操作人的backend帳號id');
			$table->integer('create_ts')->default(0);
			$table->boolean('flag')->default(1)->comment('0: 刪除
1: 正常');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pre_schedule_process');
	}

}

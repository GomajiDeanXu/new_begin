<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductPreScheduleGroupListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_pre_schedule_group_list', function(Blueprint $table)
		{
			$table->integer('pre_schedule_id')->default(0)->index('idx_pre_schedule_id')->comment('gomaji.product_pre_schedule.pre_schedule_id
');
			$table->integer('group_id')->default(0)->index('idx_group_id');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('0: 刪除
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
		Schema::drop('product_pre_schedule_group_list');
	}

}

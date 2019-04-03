<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupControlTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('transaction')->create('group_control', function(Blueprint $table)
		{
			$table->integer('gc_id', true);
			$table->integer('group_id')->default(0)->index('idx_group_id')->comment('GID');
			$table->integer('sales1')->default(0)->comment('獎金首次發放');
			$table->integer('channel1')->default(0);
			$table->integer('sales2')->default(0)->comment('補發寄件獎金');
			$table->integer('channel2')->default(0);
			$table->boolean('type')->default(0)->index('idx_type')->comment('資料類型：[1]已計算過獎金(寄件與達成皆計算) [2]只拿到達成獎金，計件獎金尚未拿到');
			$table->boolean('flag')->default(1)->index('idx_flag')->comment('有效碼[1]有效[-1]無效');
			$table->integer('date_create')->default(0)->comment('建立日期');
			$table->integer('date_modify')->default(0)->comment('第二次修改日期');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('transaction')->drop('group_control');
	}

}
